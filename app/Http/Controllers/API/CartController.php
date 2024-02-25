<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use App\Models\BoughtProducts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Auth;
use Hash;  

class CartController extends Controller
{
    //SHOWS PRODUCTS IN CART
    public function index(){
        $cart = Cart::all()->where('user_id',Auth::user()->id);
        $total = Cart::all()->where('user_id',Auth::user()->id)->sum('price');
        $quantity = Cart::all()->where('user_id',Auth::user()->id)->sum('quantity');
        return  view('Cart',compact('cart','total','quantity'));
    }

    public function checkoutindex(){
        $addresses = Address::all()->where('user_id',Auth::user()->id);
        $cart = Cart::all()->where('user_id',Auth::user()->id);
        $total = Cart::all()->where('user_id',Auth::user()->id)->sum('price');
        $totalitems = Cart::all()->where('user_id',Auth::user()->id)->sum('quantity');
        return view('CheckOut',compact('addresses','cart','total','totalitems'));
    }

    //ADDS TO CART
    public function add_cart(Request $request, $id,) {

        if (Auth::id())
        {
            $user_id=auth()->user();

        $product = Products::find($id);
        $cart = Cart::where('user_id', $user_id->id)
        ->where('name',$product->name)
        ->where('photo',$product->photo)
        ->where('price',$product->price)
        ->where('details',$product->details)
        ->where('category',$product->category)
        ->first();

        if ($cart){
            $cart -> update([
            'name' => $product->name,
            'photo' => $product->photo,
            'price' => $product->price,
            'details' => $product->details,
            'category' => $product->category,
            'quantity' => $cart->quantity+1,
            'user_id' => $user_id = $request->user()->id,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
        else{
        
        Cart::create([
            'name' => $product->name,
            'photo' => $product->photo,
            'price' => $product->price,
            'details' => $product->details,
            'category' => $product->category,
            'quantity' => 1,
            'user_id' => $user_id = $request->user()->id,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        }
        return redirect()->back()->with(['status' => 'Product added to cart successfully'], 200);
        }
        else{
            return redirect('login');
        }
    }


    //DELETES A PRODUCT FROM CART
    public function destroy($id){
        $product = Cart::find($id);
        $product -> delete();
        return redirect()->back()->with(['status' => "Product removed"]);
    }

    //to cart
    public function checkout(Request $request){
        $items = Cart::get();
        foreach($items as $key => $value){
            BoughtProducts::create([
                'name' => $value->name,
                'photo' => $value->photo,
                'price' => $value->price,
                'details' => $value->details,
                'category' => $value->category,
                'user_id' => $user_id = $request->user()->id,
            ]);
        }
        
        $total = Cart::where('price')->sum('price');
        Cart::where('user_id', $user_id)->delete();
        return response()->json(['message' => 'Purchase succesful, total spent', $total], 200);
    }

    
}