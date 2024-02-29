<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="/public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Cartel</title>
    <link rel="stylesheet" href="login.css">
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://db.onlinewebfonts.com/c/215107c04d97667966f3b627c9e79860?family=Spoof+Trial+Thin"
        rel="stylesheet">
    <style>
        @import url(https://db.onlinewebfonts.com/c/215107c04d97667966f3b627c9e79860?family=Spoof+Trial+Thin);

        @font-face {
            font-family: "Spoof Trial Thin";
            src: url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.eot");
            src: url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.eot?#iefix")format("embedded-opentype"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.woff2")format("woff2"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.woff")format("woff"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.ttf")format("truetype"),
                url("https://db.onlinewebfonts.com/t/215107c04d97667966f3b627c9e79860.svg#Spoof Trial Thin")format("svg");
        }

        body {
            font-family: "Spoof Trial Thin";
            padding-top: 60px;
            overflow-x: hidden;
            /* Add padding to body for the fixed navbar */
        }

        footer {
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .black-button {
            background-color: black;
            color: white;
        }

        .black-link {
            text-decoration: none;
            color: black;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: center;
        }

        #selectedLocation {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        #dropdowns {
            display: none;
            text-align: left;
            width: 100%;
        }

        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .navbar-brand img {
            transition: transform 0.3s ease-in-out;
            /* Apply the transition to the transform property */
        }

        .navbar-brand img:hover {
            transform: scale(1.1);
            /* Increase the scale on hover */
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top"
        style="background-color: black; position: fixed; width: 100%; border-radius: 0 0 15px 15px;">
        <a  href="/"><img src="images/cyber_-removebg-preview.png" style="width:200px;"></a>
    </nav>
<body>

    <!-- Login Content -->
    <section style="margin-top: 55px; margin-bottom: 20px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-10">
                <table style="border: 1px solid #ccc; border-radius: 10px; width:100%;">
                            <tr>
                                <td style=" padding: 2%;">
                                    <p style="font-size: 15px; margin-bottom:-2.5px;">Your address details are
                                        protected.</p>
                                </td>
                            </tr>
                            <tr>
                                <td style=" padding-left: 2%;">
                                    <p style="font-size: 12px">Cyber Cartel will be secure with your personal information.</p>
                                </td>
                            </tr>
                        </table>
                        <h5 style="margin-top:2.5%; margin-bottom:2.5%">Address</h5>
                        @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                        
                        <form action="{{url ('edit_address/'.$address->id.'')}}" method = "POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Region</label>
                                <input type="text" name="region" class="form-control" value="{{$address -> region}}"/>
                                @error('region') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" value="{{$address -> city}}"/>
                                @error('city') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{$address -> address}}"/>
                                @error('address') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Postal Code</label>
                                <input type="text" name="postal_code" class="form-control" value="{{$address -> postal_code}}"/>
                                @error('postal_code') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <button type="button" class="btn btn-light" style="width: 48%; border: 1px solid #000000;">
                                <a href="/address"
                                    style="text-decoration: none; color: #000000; width: 100%; display: block;">Back</a>
                            </button>
                            <button type="submit" class="btn btn-secondary primary black-button" style="width: 48%;">Update
                            </button>
                            </button>
                            </div>
                            </form>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>

    <!-- Footer Section -->
    <footer class="bg-black text-light text-center py-2 fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md text-left pl-md-2">
                    <p style="margin-top: 15px; margin-left: -170px;"><a href="/terms" class="text-light"
                            style="text-decoration: none;">Terms and Conditions</a></p>
                </div>
                <div class="col-md text-center">
                    <p style="margin-top: 15px; margin-right: -1250px;">&copy; 2023 Login Page. All rights reserved.</p>
                </div>
                <div class="col-md text-right pr-md-2">
                    <p style="margin-top: 15px; margin-right: -2663px;"><a
                            href="https://www.facebook.com/cybercartelpage" class="text-light"
                            style="text-decoration: none;">Follow us on Facebook</a></p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function showDropdown() {
            var dropdowns = document.getElementById("dropdowns");
            dropdowns.style.display = "block";
        }

        function updateLocation(type) {
            var selectedDropdown = document.getElementById(type + "Dropdown");
            var selectedValue = selectedDropdown.value;
            var selectedInput = document.getElementById(type);
            selectedInput.value = selectedValue;

            updateVisibleInput();
        }

        function updateVisibleInput() {
            var region = document.getElementById("region").value;
            var province = document.getElementById("province").value;
            var city = document.getElementById("city").value;
            var barangay = document.getElementById("barangay").value;

            var visibleInput = document.getElementById("selectedLocation");
            visibleInput.value = `${barangay}, ${city}, ${province}, ${region}`;
        }
    </script>

    <!-- Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>