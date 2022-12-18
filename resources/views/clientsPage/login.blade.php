<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign</title>
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/login.css') }}">
</head>

<body>
    <form action="">
        <div class="container">
            <div id="signInForm" class="container__signIn active">
                <div class="container__signIn-tittle">Sign In</div>
                <div class="container__signIn-input">
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input">
                        <label class="user-label">Username</label>
                    </div>
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input">
                        <label class="user-label">Password</label>
                    </div>
                </div>
                <div class="container__signIn-button">
                    <button>Sign in</button>
                </div>
                <div class="container__signIn-change">
                    <button id="toRegister">Register</button>
                </div>
            </div>
            <div id="registerForm" class="container__signIn ">
                <div class="container__signIn-tittle">Register</div>
                <div class="container__signIn-input">
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input">
                        <label class="user-label">Firstname</label>
                    </div>
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input">
                        <label class="user-label">Lastname</label>
                    </div>
                    <div class="input-group">
                        <input required="" type="date" name="text" autocomplete="off" class="inputDate">
                        <label class="user-labelDate">DOB</label>
                    </div>
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input">
                        <label class="user-label">Email</label>
                    </div>
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input">
                        <label class="user-label">Username</label>
                    </div>
                    <div class="input-group">
                        <input required="" type="text" name="text" autocomplete="off" class="input">
                        <label class="user-label">Password</label>
                    </div>
                </div>
                <div class="container__signIn-button">
                    <button>Sign up</button>
                </div>
                <div class="container__signIn-change">
                    <button id="toSignIn">Sign in</button>
                </div>
            </div>
        </div>
        <div id="abc" class="slideShow">
            <div id="formImage" class="slideShow-image show"
                style="background-image: url(./chanel/Bag-Chanel-Summer-Trends-2020.jpg);"></div>
            <div id="formImage" class="slideShow-image show"
                style="background-image: url(./gucci/63aeece630d8df78acf77978c2161515.jpg);"></div>
            <div id="formImage" class="slideShow-image show"
                style="background-image: url(./LV/W_Fa_Wild_at_Heart_V2.png); background-size: 140%;"></div>
            <div id="formImage" class="slideShow-image show"
                style="background-image: url(./dior/Dior-Fall-2020-Runway-Bag-Collection-5.jpg);"></div>
        </div>
    </form>
</body>
<script src="{{ asset('javascript/client/loginNew.js') }}"></script>

</html>
