<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>

    <link rel="stylesheet" href="{{asset('/css/forgot.css')}}">

</head>
<body>
    <div id="divbackground">
        <div id="divwelcome">
            <p id="welcometxt"><strong>Welcome to BinusEats!</strong></p>
        </div>

        <div id="divcontentbackground">
            <div id="divlogo">
                <img id="logo" src="{{asset('/images/Logo_Binuseats.png')}}" alt="Logo BinusEats">
            </div>
            <div class="resetpass">
                <p id="resetpasstxt"><strong>Reset Password</strong></p>
            </div>
            @yield('content')
      </div>
    </div>
</body>
</html>
