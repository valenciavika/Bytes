@extends('/user_page.main_template')

@section('content')
    @if ($errors->any())
    <script>
        window.location.href = window.location.href.split('#')[0] + '#popupedit';
    </script>
@endif
    <div class="allprofile">

        <div class="partTopUp">
            <p id="text" class="Ballance"><strong>Balance</strong></p>

            @foreach ($emoneys as $emoney)
            <div class="emoney_content">
                <div class="logoNtext">
                    <div class="logo">
                        <img id="logo" src="{{ $emoney->img }}" alt="Logo {{ $emoney->name }}">
                    </div>

                    <div class="paymentname">
                        <p class="payment">{{ $emoney->name }}</p>
                    </div>

                </div>

                <div class="total_amount">
                    <p> Rp{{number_format($moneys[$emoney->id-1]->totalAmount, 0 , '.' , '.' )}}</p>
                </div>
            </div>
            @endforeach

            <div class="Topupbutton">
                <button type="submit" id="button" value="topup" class="TopUpButton" onclick="window.location.href='/{{$id}}/topup/BiPay/History'">
                    <p id="Topup">
                        <strong>TOP UP</strong>
                    </p>
                </button>
            </div>

        </div>
        <div class="partPofile">
            <div class="bagianatas">
                <div class="profile-image">
                    <img class="foto"src="https://storage.googleapis.com/k-react.appspot.com/images/profilePicture/S9pCIFcoBkuBm2SHIvLG_300x300.jpg" alt="Profile Image">
                    <div class="edit-overlay">
                        <span class="edit-text">Edit Foto</span>
                    </div>
                </div>
                <div class="welcome-edit">
                    <div class="welcome">
                        <p>Welcome!</p>
                        <strong style="text-transform: uppercase;">{{$user->name}}</strong>
                    </div>
                    <div class="editbutton">
                        <a href="#popupedit" class="editButton">
                            {{-- <i class="fa fa-pencil" aria-hidden="true"></i>
                            <p id="editdata">
                                <strong>Edit</strong>
                            </p> --}}
                            <div class="edittxt"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="datadiri">
                <strong>Full Name</strong>
                <p class="isidata"style="text-transform: capitalize">{{$user->name}}</p>

                <strong>Email</strong>
                <P class="isidata">{{$user->email}}</P>

                <strong>Phone Number</strong>
                @if ($user->phone)
                    <p class="isidata">{{$user->phone}}</p>
                @else
                    <p class="isidata">-</p>
                @endif

            </div>

            <div class="signoutbutton">
                <form action="/signout" method="post">
                    @csrf
                    <button type="submit" id="button" value="edit" class="signoutButton">
                        <p id="signout">
                            <strong>SIGN OUT</strong>
                        </p>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="popupedit" id="popupedit">
        <div class="popupContent">
            <div class="editprofiletext">
                <strong>EDIT PROFILE</strong>
            </div>

            <form action="{{ route('edit.profile', $user->id)}}" method="POST" class="editprofile" id="editProfileForm">
                @csrf
                <div class="name">
                    <strong>Full Name</strong><br>
                    <input type="text" name="fullname" class="inputtext" id="name" placeholder="{{$user->name}}" style="text-transform: capitalize">
                    @error('fullname')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="email">
                    <strong>Email</strong><br>
                    <input type="email" name="email" class="inputtext" id="email" placeholder="{{$user->email}}">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="phonenumber">
                    <strong>Phone Number</strong><br>
                    @if ($user->phone)
                        <input type="tel" name="phonenumber" class="inputtext" id="phonenumber" placeholder="{{$user->phone}}">
                    @else
                        <input type="tel" name="phonenumber" class="inputtext" id="phonenumber" placeholder="-">
                    @endif
                    @error('phonenumber')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="Allbutton">
                    <div class="save-wrapper">
                        <div class="discardbutton" id="discardButtonContainer" style="display: none;">
                            <button id="discardButton" value="edit" class="discardButton" onclick="discardForm(event)">
                                <p id="discard">
                                    <strong>DISCARD</strong>
                                </p>
                            </button>
                        </div>

                        <div class="savebutton">
                            <button id="savebutton" value="edit" class="saveButton" onclick="changeInputValue(event)">
                                <p id="save">
                                    <strong>SAVE</strong>
                                </p>
                            </button>
                        </div>
                    </div>
                </div>

                <style>
                    input.placeholder-color {
                        color: #999999; /* Set the color of the placeholder text */
                    }
                </style>

                <script>
                    function discardForm(event) {
                        event.preventDefault(); // Prevent form submission
                        document.getElementById('editProfileForm').reset();
                        document.getElementById('discardButtonContainer').style.display = 'none';
                    }

                    const inputs = document.querySelectorAll('.inputtext');

                    inputs.forEach(input => {
                        input.addEventListener('input', () => {
                            const discardButtonContainer = document.getElementById('discardButtonContainer');
                            if (input.value.trim().length > 0) {
                                discardButtonContainer.style.display = 'block';
                            } else {
                                discardButtonContainer.style.display = 'none';
                            }
                        });
                    });

                    function changeInputValue(event) {
                        const inputName = document.getElementById('name');
                        const inputEmail = document.getElementById('email');
                        const inputPhone = document.getElementById('phonenumber');

                        if(!inputName.value){
                            inputName.value = inputName.placeholder;
                            inputName.classList.add('placeholder-color');
                        }
                        if(!inputEmail.value){
                            // inputName.removeAttribute('name');
                            inputEmail.value = inputEmail.placeholder;
                            inputEmail.classList.add('placeholder-color');
                        }
                        if(!inputPhone.value){
                            // inputName.removeAttribute('name');
                            inputPhone.value = $user->phone;
                            inputPhone.classList.add('placeholder-color');
                        }
                        var form = document.getElementById("editProfileForm");
                        form.submit();
                    }
                </script>
            </form>
        </div>
    </div>
@endsection


@push('styles')
    <link href="{{asset('css/profile.css')}}" rel="stylesheet" />
@endpush
