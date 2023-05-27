@extends('/forgotpass')

@section('content')
    <div class="formsection">
        <form action="/forgotpass" id="form" method="post">
            @csrf
            <div class="isiform">
                <div class="email_input">
                    <input type="email" id="emailphone" name="email" class="textbox" placeholder="Email/Phone number" required autofocus value="{{ old('email')}}"">
                    @error('email')
                    {{ $message}}
                    <div class="invalid">
                        </div>
                    @enderror
                </div>
                <div class="part_button">
                    <button type="submit" id="button" value="verification">
                        <p id="verification">
                            <strong>SEND VERIFICATION EMAIL</strong>
                        </p>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
