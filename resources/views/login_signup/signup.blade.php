@extends('login_signup_template')

@section('content')
    <div id="divsignupform">
        <div id="divsignuptxt">
            <p id="signuptxt">
                <strong>Sign Up BinusEats</strong>
            </p>
            <br>
        </div>
        <form action="/signup" id="suform" method="">
            <div class="upper_part">                          
                <input type="text" id="fullname" class="textbox" placeholder="Full name" required>
                <input type="email" id="emailphone" class="textbox" placeholder="Email/Phone number" required>
                <input type="password" id="password" class="passbox" placeholder="Password" required>
                <input type="password" id="confirmpassword" class="passbox" placeholder="Confirm Password" required>
                <div class="agreement">
                    <input type="checkbox" id="checkbox" required>
                    <label for="checkbox" id="tnc">I agree to the terms and conditions</label>
                </div>
            </div>
            <div class="lower_part">
                <button formaction="Login.html" type="submit" id="button" value="SIGN UP">
                    <p id="signup">
                        <strong>SIGN UP</strong>
                    </p>
                </button>
                <p id="alrd">Already have an account? 
                    <a id="login" href="/login"><span id="login" style="color: #F26122">Log in</span></a>
                </p>
            </div>
        </form>
    </div>
@endsection