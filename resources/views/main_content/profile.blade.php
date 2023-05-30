@extends('/main_template')

@section('content')
    <div class="allprofile">

        <div class="partTopUp">
            <p id="text" class="Ballance"><strong>Balance</strong></p>

            <div class="Bipay">
                <div id="divlogo">
                    <img id="logo" src="{{asset('/images/Logo_Binuseats.png')}}" alt="Logo BinusEats">
                </div>
                <div class="text">
                    <p class="payment">BiPay</p>
                </div>
                <div class="bipayamount">
                    <p>Rp12.000</p>
                </div>
            </div>

            <div class="Ovo">
                <div id="divlogo">
                    <img id="logo" src="{{asset('/images/Logo_Ovo.png')}}" alt="Logo OVO">
                </div>
                <div class="text">
                    <p class="payment">Ovo Cash</p>
                    <p class="payment point">Ovo Points</p>
                </div>
                <div class="ovoamount">
                    <p>Rp15.277</p>
                    <p class="point">Rp 5.529</p>
                </div>
            </div>

            <div class="Gopay">
                <div id="divlogo">
                    <img id="logo" src="{{asset('/images/Logo_Gopay.png')}}" alt="Logo BinusEats">
                </div>
                <div class="text">
                    <p class="payment">GoPay</p>
                    <p class="payment point">GoPay Points</p>
                </div>
                <div class="gopayamount">
                    <p>Rp50.512</p>
                    <p class="point">Rp59.510</p>
                </div>
            </div>

            <div class="Topupbutton">
                <button type="submit" id="button" value="topup" class="TopUpButton" onclick="window.location.href='/1/topup/BiPay'">
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
                        <button type="submit" id="button" value="edit" class="discardButton" onclick="window.location.href='/profile'">
                            <p id="discard">
                                <strong>DISCARD</strong>
                            </p>
                        </button>
                    </div>

                    <div class="savebutton">
                        <button type="submit" id="button" value="edit" class="saveButton" onclick="window.location.href='/profile'">
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
