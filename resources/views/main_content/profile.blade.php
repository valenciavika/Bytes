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
                <div class="welcome">
                    <p>Welcome!</p>
                    <strong>MATTHEW CHRISTIAN HADIPRASETYA</strong>
                </div>
                <div class="editbutton">
                    <a href="#popupedit" class="editButton">
                        <p id="editdata">
                            <strong>Edit</strong>
                        </p>
                    </a>
                </div>



            </div>

            <div class="datadiri">
                <strong>Full Name</strong>
                <p class="isidata">MATTHEW CHRISTIAN HADIPRASETYA</p>

                <strong>Email</strong>
                <P class="isidata">matthew.hadiprasetya@binus.ac.id</P>

                <strong>Phone Number</strong>
                <p class="isidata">082178348389</p>
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

            <div class="editprofile">
                <div class="name">
                    <strong>Full Name</strong><br>
                    <input type="text" id="fullname" class="inputtext" placeholder="MATTHEW CHRISTIAN HADIPRASETYA">
                </div>
                <div class="email">
                    <strong>Email</strong><br>
                    <input type="email" id="email" class="inputtext" placeholder="matthew.hadiprasetya@binus.ac.id">
                </div>

                <div class="phonenumber">
                    <strong>Phone Number</strong><br>
                    <input type="number" id="phonenumber" class="inputtext" placeholder="082178348389">
                </div>

                <div class="Allbutton">
                    <div class="discardbutton">
                        <button type="submit" id="button" value="edit" class="discardButton" onclick="window.location.href='/profile/{{$id}}'">
                            <p id="discard">
                                <strong>DISCARD</strong>
                            </p>
                        </button>
                    </div>

                    <div class="savebutton">
                        <button type="submit" id="button" value="edit" class="saveButton" onclick="window.location.href='/profile/{{$id}}'">
                            <p id="save">
                                <strong>SAVE</strong>
                            </p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
