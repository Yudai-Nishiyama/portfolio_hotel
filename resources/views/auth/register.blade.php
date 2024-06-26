<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <!-- Link to Raleway font -->
      <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
      <!-- Link to Bona Nova font -->
      <link href="https://fonts.googleapis.com/css2?family=Bona Nova:wght@400;700&display=swap" rel="stylesheet">

    <!-- Link to fontawesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <title>Registration</title>
</head>
<body class="register">
    <main>
        <div class="registration">
            <div class="registrarion-form">
                <img class="logo" src="{{asset('images/My Room Your Room-logos 2.png')}}" alt="ホテルのロゴ">
                <h1 class="register_title">Registration Form</h1>

                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="inputs">
                        <div class="input-container">
                            <label for="firstName">First Name</label>
                            <input class="input_content" type="text" id="firstName" name="first_name" value="{{ old('first_name')}}" placeholder="Enter your first name">
                            @error("first_name")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-container">
                            <label for="lastName">Last Name</label>
                            <input class="input_content" type="text" id="lastName" name="last_name" value="{{ old('last_name')}}" placeholder="Enter your last name">
                            @error("last_name")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="inputs">
                        <div class="input-container">
                            <label for="username">User Name</label>
                            <input class="input_content" type="text" id="userName" name="username" value="{{ old('username')}}" placeholder="Enter your user name" autocomplete="off">
                            @error("username")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-container">
                            <label for="adress">Address</label>
                            <input class="input_content" type="text" id="address" name="address" value="{{ old('address')}}" placeholder="123 Street, Apt567, State 12345, USA">
                            @error("address")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="inputs">
                        <div class="input-container">
                            <label for="email">Email</label>
                            <input class="input_content" type="text" id="email" name="email" value="{{ old('email')}}" placeholder="mail@mail.com">
                            @error("email")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-container">
                            <label for="phone_number">Phone Number</label>
                            <input class="input_content" type="text" name="phone_number" value="{{ old('phone_number')}}" id="phone_number" placeholder="(+63)0123456789">
                            @error("phone_number")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="inputs">
                        <div class="input-container">
                            <label for="password">Password</label>
                            <input class="input_content" type="password" id="password" name="password" value="{{ old('password')}}" placeholder="Enter your password" autocomplete="off">
                            @error("password")
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-container">
                            <label for="password-comfirm">Password Confirmation</label>
                            <input class="input_content" type="password" id="password-confirm" name="password_confirmation" value="{{ old('password_confirmation')}}" placeholder="Confirm your password">
                            @error("password_confirmation")
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="inputs">

                        <div class="input-container">
                            <input class="rg_button input_content" type="submit" value="Registration">
                        </div>

                    </div>

                    <a class="link" href="{{ url('/login') }}">If you have already registered , click here</a>


                </form>

                <!-- Repeat the structure for other input fields -->

            </div>

            <div class="registration-image">
                <img src="{{asset('images/registration-image.png')}}" alt="">
            </div>
        </div>
    </main>
</body>
</html>
</html>


