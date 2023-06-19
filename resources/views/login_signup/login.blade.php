@extends('/login_signup_template')

@section('content')
    <div id="divsignupform">
        <div id="divsignuptxt">
            <p id="signuptxt">
                <strong>Log In BinusEats</strong>
            </p>
            <br>
        </div>
        @if(session()->has('LoginError'))
            <div class="alert_login_failed" role="alert">
            {{ session('LoginError') }}
            </div>
        @elseif(session()->has('reset_pass_success'))
            <div class="alert_login_failed" role="alert">
                {{ session('reset_pass_success') }}
            </div>
        @endif

        <form action="/login" id="suform" method="post">
            @csrf
            <div class="upper_part">
                <input type="email" id="emailphone" name="email" class="textbox" placeholder="Email" required autofocus value="{{ old('email')}}"">
                @error('email')
                {{ $message}}
                <div class="invalid">
                    </div>
                @enderror

                <input type="password" id="password" name="password" class="passbox" placeholder="Password" required >
                @error('password')
                    <div class="invalid">
                        {{ $message}}
                    </div>
                @enderror
                <div class="forgotpassword">
                    <p id="fp"> <a class="login" href="/forgotpass">Forgot password?</a></p>
                </div>
            </div>
            <div class="lower_part">
                <button type="submit" id="button-signup" value="SIGN UP">
                    <p id="signup">
                        <strong>LOG IN</strong>
                    </p>
                </button>
                <p id="alrd">Don't have an account?
                    <a id="login" href="/signup"><span id="login" style="color: #F26122">Sign up</span></a>
                </p>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link href="{{asset('css/login.css')}}" rel="stylesheet" />
@endpush