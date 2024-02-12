<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Cart;

class UserController extends Controller
{
    //SHOWS USERS AND INFORMATION
    public function index(){
        return User::with('addresses')->get();
    }

    //DELETES USER INFORMATION
    public function destroy($id){
        $user = User::find($id);
        $user -> adresses()->delete();
        $user->delete();
        return response()->json(['message' => 'successfully deleted']);
    }



    // DITO LANG BAKA MAGAMIT ========================================================
    // public function store(Request $request){
    //     $user = User::create($request->all());
    //     if($request->has('addresses')){
    //         $user->addresses()->createMany($request->input('addresses'));
    //     }
    // }
    
    // public function update(Request $request, $id){
    //     $user = User::find($id);
    //     $user -> update($request->all());
    //     return response()->json(['user' => $user]);
    // }

    // public function store(Request $request){
    //     $user = User::create($request->all());
    //     if($request->has('addresses')){
    //         $user->books()->createMany($request->input('addresses'));
    //     }
    //     return response()->json($author, 201);
    // }
}
