@extends('/main_template')

@section('content')
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
                            <p id="editdata">
                                <strong>Edit</strong>
                            </p>
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
                <button type="submit" id="button" value="edit" class="signoutButton" onclick="window.location.href='/login'">
                    <p id="signout">
                        <strong>SIGN OUT</strong>
                    </p>
                </button>
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
                    <input type="text" name="fullname" class="inputtext" placeholder="{{$user->name}}" style="text-transform: capitalize">
                </div>
                <div class="email">
                    <strong>Email</strong><br>
                    <input type="email" name="email" class="inputtext" placeholder="{{$user->email}}">
                </div>

                <div class="phonenumber">
                    <strong>Phone Number</strong><br>
                    @if ($user->phone)
                        <input type="tel" name="phonenumber" class="inputtext" placeholder="{{$user->phone}}">
                    @else
                        <input type="tel" name="phonenumber" class="inputtext" placeholder="-">
                    @endif

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
                            <button type="submit" id="button" value="edit" class="saveButton">
                                <p id="save">
                                    <strong>SAVE</strong>
                                </p>
                            </button>
                        </div>
                    </div>
                </div>

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
                </script>
            </form>
        </div>
    </div>
@endsection


