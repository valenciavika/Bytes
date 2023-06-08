@extends('login_signup_template')

@section('content')
    <div id="divsignupform">
        <div id="divsignuptxt">
            <p id="signuptxt">
                <strong>Sign Up BinusEats</strong>
            </p>
            <br>
        </div>
        <form action="/signup" id="suform" method="post">
            @csrf
            <div class="upper_part">
                <input type="text" id="fullname" class="textbox" placeholder="Full name" name="name" required value="{{ old('name') }}" autofocus>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <input type="email" id="emailphone" class="textbox" placeholder="Email" name="email" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                <input type="password" id="password" class="passbox" placeholder="Password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <input type="password" id="confirmpassword" class="passbox" placeholder="Confirm Password" name="confirm_password" required>
                @error('confirm_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="agreement">
                    <input type="checkbox" id="checkbox" name="checkbox" required>
                    <label for="checkbox" id="tnc">I agree to the terms and conditions</label>
                </div>
            </div>
            <div class="lower_part">
                <button type="submit" id="button-signup" value="SIGN UP">
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
