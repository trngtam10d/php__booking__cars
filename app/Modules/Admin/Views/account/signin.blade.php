<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignIn|Admin</title>
    <link rel="stylesheet" href="{{ asset('public/assets/css/login.css') }}">
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form " action="{{ route('send.login') }}" method="POST">
                @csrf
                <h2>SIGN IN TO YOUR ACCOUNT</h2>
                @error('email')
                    <span id="vaild-pass">{{ $message }}</span>
                @enderror
                <input type="text" required placeholder="Email" name="email" id="user" autocomplete="off" />
                @error('password')
                    <span id="vaild-pass">{{ $message }}</span>
                @enderror
                <input oninput="return formvalid()" type="password" name="password" required placeholder="Password" id="pass"
                    autocomplete="off" />
                <img src="https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png"
                    onclick="show()" id="showimg">
                <span id="vaild-pass"></span>
                <button type="submit">SIGN IN</button>
                <p class="message"><a href="#">Forgot your password?</a></p>
            </form>
        </div>
    </div>

    <script src="{{ asset('public/systems/js/account.js') }}"></script>
</body>

</html>
