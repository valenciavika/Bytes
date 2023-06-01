@extends('/main_template')



@section('content')
    <!-- Add a hidden modal box -->
    <div class="body-section">
        <div class="topup-container">
            <div class="emoneyButton">
                <a class="button" href="/{{ $user->id }}/topup/BiPay/{{$type}}" style="background-color: #{{ $active == 1 ? 'F9C140': 'Fad685'}}; border-bottom:{{$active == 1?'none':"solid 0.2vw rgba(0, 0, 0, 0.2)"}}"><img src="{{$tr_emone[0]->img}}" alt=""> BiPay</a>
                <a class="button" href="/{{ $user->id }}/topup/OVO/{{$type}}" style="background-color: #{{ $active == 2 ? 'F9C140': 'Fad685'}}; border-bottom:{{$active == 2?'none':"solid 0.2vw rgba(0, 0, 0, 0.2)"}}"><img src="{{$tr_emone[1]->img}}" alt="">OVO</a>
                <a class="button" href="/{{ $user->id }}/topup/GoPay/{{$type}}"style="background-color: #{{ $active == 3 ? 'F9C140': 'Fad685'}};border-bottom:{{$active == 3?'none':"solid 0.2vw rgba(0, 0, 0, 0.2)"}}"><img src="{{$tr_emone[2]->img}}" alt="">GoPay</a>
            </div>
            <form action="{{ route('topup.process')}}" method="POST" class="topup2" onsubmit="return showTopUpConfirmation(event)">
                @csrf
                <input type="text" name="user_id" value="{{ $user->id }}" style="display: none;">
                <input type="text" name="emoney_id" value="{{ $emoney[0]->id }}" style="display: none;">
                <div class="saldo">
                    <div class="emone">
                        @foreach ($emoney as $em)
                            <img src="{{$em['img']}}" alt="">
                            <p style="margin-left:0.5vw">{{$em['name']}}</p>
                        @endforeach
                    </div>
                    @foreach ($money as $m)
                        @if ($m['user_id']==$id)
                            <p>Rp{{$m['formattedPrice']}}</p>
                        @endif

                    @endforeach
                </div>
                <input class="amount" type="text" name="amount" placeholder="INSERT AMOUNT.." required>

                <div class="method-payment">
                    <p class="method-text">Payment Methods</p>
                    <div class="methods">
                        @foreach ($method as $pm)
                            <label>
                                <input type="radio" name="payment_method" value="{{$pm['id']}}" required>
                                {{$pm['name']}}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="button">
                    <button type="submit" class="topup_but">
                        <p>TOP UP</p>
                    </button>
                </div>

            </form>
        </div>
        <div id="topupConfirmation" class="modal">
            <div class="modal-content">
                <h3 style="font-size: 3vw">Top Up Confirmation</h3>
                <p style="font-size: 1.5vw">Are you sure you want to top up your {{$emoney[0]->name}}?</p>

                <div class="modal-buttons">
                    <button style="font-size: 1.5vw" id="confirmTopUpButton" class="confirm-button">Yes</button>
                    <button style="font-size: 1.5vw" id="cancelTopUpButton" class="cancel-button">No</button>
                </div>
            </div>
        </div>

        <div class="history-help">
            <div class="emoneyButton">
                <a class="button" href="/{{ $user->id }}/topup/{{$emoney[0]->name}}/History" style="background-color: #{{ $type == "History" ? 'F9C140': 'Fad685'}}; border-bottom:{{$type == "History"?'none':"solid 0.2vw rgba(0, 0, 0, 0.2)"}}">History</a>
                <a class="button" href="/{{ $user->id }}/topup/{{$emoney[0]->name}}/Help" style="background-color: #{{ $type == "Help" ? 'F9C140': 'Fad685'}}; border-bottom:{{$type == "Help" ? 'none':"solid 0.2vw rgba(0, 0, 0, 0.2)"}}">Help</a>
            </div>
            <div class="history-topup">
                <div class="history-box">
                    @if ($type == "History")
                        <p class="judul">History</p>
                        <div class="topup-hist">
                            @foreach ($transaction as $t)
                                <div class="date">
                                    <p>{{$t['transaction_day']}}, {{$t['transaction_date']}}</p>
                                </div>

                                <div class="topupp">
                                    <p>{{$t['method']}}</p>

                                    @if ($t['method']==="Payment")
                                        <p>- Rp{{number_format($t['amount'], 0 , '.' , '.' )}}</p>
                                    @else
                                        <p>+ Rp{{number_format($t['amount'], 0 , '.' , '.' )}}</p>
                                    @endif

                                </div>

                                <div class="time-hist">
                                    <p>{{$t['transaction_time']}}</p>
                                    @foreach ($tr_emone as $em)
                                        @if ($em['id']==$t['emoney_id'])
                                            <div class="emoney-hist">
                                                <img src="{{$em['img']}}" alt="">
                                                <p>{{$em['name']}}</p>
                                            </div>
                                            @break
                                        @endif
                                    @endforeach
                                </div>

                            @endforeach
                        </div>
                    @else
                        <p class="judul">Help</p>
                        <div class="history-box">
                            <div class="topup-hist">
                                <div class="text">
                                    @if ($emoney[0]->name == "BiPay")
                                        <div class="methodss">
                                            <h2>Debit</h2>
                                            <p>To top up your BiPay account with a debit card, please follow these instructions:</p>
                                            <div class="instruct">
                                                <p>1. Ensure that you have a valid debit card linked to your bank account with sufficient funds.</p>
                                                <p>2. Open the BinusEats website on your computer or phone.</p>
                                                <p>3. Log in to your BiPay account in Binus Eats using your registered credentials. If you don't have an account, you may need to create one before proceeding.</p>
                                                <p>4. Once you're logged in, locate the "Top Up" option within the website interface.</p>
                                                <p>5. Select the "Debit Card" option as your preferred payment method for topping up.</p>
                                                <p>6. Enter the necessary details of your debit card, including the card number, expiration date, and CVV (three-digit security code on the back of the card).</p>
                                                <p>7. Specify the amount you wish to top up into your BiPay account.</p>
                                                <p>8. Review the transaction details to ensure accuracy and confirm that you are authorizing the payment from your linked debit card.</p>
                                                <p>9. Follow any additional prompts or security measures required by your bank or BiPay to complete the transaction. This may include entering a one-time password (OTP) sent to your registered mobile number or other authentication steps</p>
                                                <p>10. Once the payment is successfully processed, you will receive a confirmation history indicating that the funds have been added to your BiPay account.</p>
                                            </div>
                                        </div>
                                        <div class="methodss">
                                            <h2>M-BCA</h2>
                                            <p>To top up your BiPay account using m-BCA, please follow these instructions:</p>

                                            <div class="instruct">
                                                <p>1. Ensure that you have an m-BCA mobile banking application installed on your smartphone and that you have a valid m-BCA account with sufficient funds.</p>
                                                <p>2. Open the m-BCA mobile banking application on your smartphone and log in using your registered credentials. If you don't have an m-BCA account, you may need to register for one before proceeding.</p>
                                                <p>3. Once you're logged in, locate the "Transfer" or "Transfer to Bank" option within the app's menu. It is usually represented by a money transfer icon or a similar symbol.</p>
                                                <p>4. Select the option to transfer funds to another bank account or another bank's e-wallet.</p>
                                                <p>5. Choose the recipient bank as "BiPay" or "BiJek" from the list of available banks or e-wallets. If BiPay is not listed, you may need to search for it in the app's search function or check under e-wallet options.</p>
                                                <p>6. Enter your BiPay account number or registered phone number associated with your BiPay account as the recipient's account number.</p>
                                                <p>7. Specify the amount you wish to transfer from your m-BCA account to your BiPay account.</p>
                                                <p>8. Review the transaction details to ensure accuracy and confirm that you are authorizing the transfer.</p>
                                                <p>9. Follow any additional prompts or security measures required by the m-BCA mobile banking application to complete the transaction. This may include entering a transaction password, one-time password (OTP), or other authentication steps.</p>
                                                <p>10. Once the payment is successfully processed, you will receive a confirmation history indicating that the funds have been added to your BiPay account.</p>
                                            </div>
                                        </div>
                                        <div class="methodss">
                                            <h2>Credit</h2>
                                            <p>To top up your BiPay account with credit, please follow these instructions:</p>
                                            <div class="instruct">
                                                <p>1. Ensure that you have a mobile device with a SIM card inserted and sufficient credit balance.</p>
                                                <p>2. Open the BinusEats website on your computer or phone.</p>
                                                <p>3. Log in to your BiPay account using your registered credentials. If you don't have an account, you may need to create one before proceeding.</p>
                                                <p>4. Once you're logged in, locate the "Top Up" option within the app or website interface.</p>
                                                <p>5. Select the "Credit" option as your preferred payment method for topping up.</p>
                                                <p>6. Enter your credit card details, including the card number, expiration date, CVV (three-digit security code on the back of the card), and the cardholder's name.</p>
                                                <p>7. Specify the amount you wish to top up into your BiPay account.</p>
                                                <p>8. Review the transaction details to ensure accuracy and confirm that you are authorizing the payment from your mobile credit.</p>
                                                <p>9. Follow any additional prompts or security measures required by your bank or BiPay to complete the transaction. This may include entering a one-time password (OTP) sent to your registered mobile number or other authentication steps.</p>
                                                <p>10. Once the payment is successfully processed, you will receive a confirmation history indicating that the funds have been added to your BiPay account.</p>
                                            </div>
                                        </div>

                                    @elseif ($emoney[0]->name == "OVO")
                                        <div class="methodss">
                                            <h2>Debit</h2>
                                            <p>To top up your OVO account with a debit card, please follow these instructions:</p>
                                            <div class="instruct">
                                                <p>1. Ensure that you have a valid debit card linked to your bank account with sufficient funds.</p>
                                                <p>2. Open the BinusEats website on your computer or phone.</p>
                                                <p>3. Log in to your OVO account in Binus Eats using your registered credentials. If you don't have an account, you may need to create one before proceeding.</p>
                                                <p>4. Once you're logged in, locate the "Top Up" option within the website interface.</p>
                                                <p>5. Select the "Debit Card" option as your preferred payment method for topping up.</p>
                                                <p>6. Enter the necessary details of your debit card, including the card number, expiration date, and CVV (three-digit security code on the back of the card).</p>
                                                <p>7. Specify the amount you wish to top up into your OVO account.</p>
                                                <p>8. Review the transaction details to ensure accuracy and confirm that you are authorizing the payment from your linked debit card.</p>
                                                <p>9. Follow any additional prompts or security measures required by your bank or OVO to complete the transaction. This may include entering a one-time password (OTP) sent to your registered mobile number or other authentication steps</p>
                                                <p>10. Once the payment is successfully processed, you will receive a confirmation history indicating that the funds have been added to your OVO account.</p>
                                            </div>
                                        </div>
                                        <div class="methodss">
                                            <h2>M-BCA</h2>
                                            <p>To top up your OVO account using m-BCA, please follow these instructions:</p>

                                            <div class="instruct">
                                                <p>1. Ensure that you have an m-BCA mobile banking application installed on your smartphone and that you have a valid m-BCA account with sufficient funds.</p>
                                                <p>2. Open the m-BCA mobile banking application on your smartphone and log in using your registered credentials. If you don't have an m-BCA account, you may need to register for one before proceeding.</p>
                                                <p>3. Once you're logged in, locate the "Transfer" or "Transfer to Bank" option within the app's menu. It is usually represented by a money transfer icon or a similar symbol.</p>
                                                <p>4. Select the option to transfer funds to another bank account or another bank's e-wallet.</p>
                                                <p>5. Choose the recipient bank as "OVO" or "BiJek" from the list of available banks or e-wallets. If OVO is not listed, you may need to search for it in the app's search function or check under e-wallet options.</p>
                                                <p>6. Enter your OVO account number or registered phone number associated with your OVO account as the recipient's account number.</p>
                                                <p>7. Specify the amount you wish to transfer from your m-BCA account to your OVO account.</p>
                                                <p>8. Review the transaction details to ensure accuracy and confirm that you are authorizing the transfer.</p>
                                                <p>9. Follow any additional prompts or security measures required by the m-BCA mobile banking application to complete the transaction. This may include entering a transaction password, one-time password (OTP), or other authentication steps.</p>
                                                <p>10. Once the payment is successfully processed, you will receive a confirmation history indicating that the funds have been added to your OVO account.</p>
                                            </div>
                                        </div>
                                        <div class="methodss">
                                            <h2>Credit</h2>
                                            <p>To top up your OVO account with credit, please follow these instructions:</p>
                                            <div class="instruct">
                                                <p>1. Ensure that you have a mobile device with a SIM card inserted and sufficient credit balance.</p>
                                                <p>2. Open the BinusEats website on your computer or phone.</p>
                                                <p>3. Log in to your OVO account using your registered credentials. If you don't have an account, you may need to create one before proceeding.</p>
                                                <p>4. Once you're logged in, locate the "Top Up" option within the app or website interface.</p>
                                                <p>5. Select the "Credit" option as your preferred payment method for topping up.</p>
                                                <p>6. Enter your credit card details, including the card number, expiration date, CVV (three-digit security code on the back of the card), and the cardholder's name.</p>
                                                <p>7. Specify the amount you wish to top up into your OVO account.</p>
                                                <p>8. Review the transaction details to ensure accuracy and confirm that you are authorizing the payment from your mobile credit.</p>
                                                <p>9. Follow any additional prompts or security measures required by your bank or OVO to complete the transaction. This may include entering a one-time password (OTP) sent to your registered mobile number or other authentication steps.</p>
                                                <p>10. Once the payment is successfully processed, you will receive a confirmation history indicating that the funds have been added to your OVO account.</p>
                                            </div>
                                        </div>
                                    @else
                                    <div class="methodss">
                                        <h2>Debit</h2>
                                        <p>To top up your GoPay account with a debit card, please follow these instructions:</p>
                                        <div class="instruct">
                                            <p>1. Ensure that you have a valid debit card linked to your bank account with sufficient funds.</p>
                                            <p>2. Open the BinusEats website on your computer or phone.</p>
                                            <p>3. Log in to your GoPay account in Binus Eats using your registered credentials. If you don't have an account, you may need to create one before proceeding.</p>
                                            <p>4. Once you're logged in, locate the "Top Up" option within the website interface.</p>
                                            <p>5. Select the "Debit Card" option as your preferred payment method for topping up.</p>
                                            <p>6. Enter the necessary details of your debit card, including the card number, expiration date, and CVV (three-digit security code on the back of the card).</p>
                                            <p>7. Specify the amount you wish to top up into your GoPay account.</p>
                                            <p>8. Review the transaction details to ensure accuracy and confirm that you are authorizing the payment from your linked debit card.</p>
                                            <p>9. Follow any additional prompts or security measures required by your bank or GoPay to complete the transaction. This may include entering a one-time password (OTP) sent to your registered mobile number or other authentication steps</p>
                                            <p>10. Once the payment is successfully processed, you will receive a confirmation history indicating that the funds have been added to your GoPay account.</p>
                                        </div>
                                    </div>
                                    <div class="methodss">
                                        <h2>M-BCA</h2>
                                        <p>To top up your GoPay account using m-BCA, please follow these instructions:</p>

                                        <div class="instruct">
                                            <p>1. Ensure that you have an m-BCA mobile banking application installed on your smartphone and that you have a valid m-BCA account with sufficient funds.</p>
                                            <p>2. Open the m-BCA mobile banking application on your smartphone and log in using your registered credentials. If you don't have an m-BCA account, you may need to register for one before proceeding.</p>
                                            <p>3. Once you're logged in, locate the "Transfer" or "Transfer to Bank" option within the app's menu. It is usually represented by a money transfer icon or a similar symbol.</p>
                                            <p>4. Select the option to transfer funds to another bank account or another bank's e-wallet.</p>
                                            <p>5. Choose the recipient bank as "GoPay" or "BiJek" from the list of available banks or e-wallets. If GoPay is not listed, you may need to search for it in the app's search function or check under e-wallet options.</p>
                                            <p>6. Enter your GoPay account number or registered phone number associated with your GoPay account as the recipient's account number.</p>
                                            <p>7. Specify the amount you wish to transfer from your m-BCA account to your GoPay account.</p>
                                            <p>8. Review the transaction details to ensure accuracy and confirm that you are authorizing the transfer.</p>
                                            <p>9. Follow any additional prompts or security measures required by the m-BCA mobile banking application to complete the transaction. This may include entering a transaction password, one-time password (OTP), or other authentication steps.</p>
                                            <p>10. Once the payment is successfully processed, you will receive a confirmation history indicating that the funds have been added to your GoPay account.</p>
                                        </div>
                                    </div>
                                    <div class="methodss">
                                        <h2>Credit</h2>
                                        <p>To top up your GoPay account with credit, please follow these instructions:</p>
                                        <div class="instruct">
                                            <p>1. Ensure that you have a mobile device with a SIM card inserted and sufficient credit balance.</p>
                                            <p>2. Open the BinusEats website on your computer or phone.</p>
                                            <p>3. Log in to your GoPay account using your registered credentials. If you don't have an account, you may need to create one before proceeding.</p>
                                            <p>4. Once you're logged in, locate the "Top Up" option within the app or website interface.</p>
                                            <p>5. Select the "Credit" option as your preferred payment method for topping up.</p>
                                            <p>6. Enter your credit card details, including the card number, expiration date, CVV (three-digit security code on the back of the card), and the cardholder's name.</p>
                                            <p>7. Specify the amount you wish to top up into your GoPay account.</p>
                                            <p>8. Review the transaction details to ensure accuracy and confirm that you are authorizing the payment from your mobile credit.</p>
                                            <p>9. Follow any additional prompts or security measures required by your bank or GoPay to complete the transaction. This may include entering a one-time password (OTP) sent to your registered mobile number or other authentication steps.</p>
                                            <p>10. Once the payment is successfully processed, you will receive a confirmation history indicating that the funds have been added to your GoPay account.</p>
                                        </div>
                                    </div>

                                    @endif
                                </div>
                            </div>

                        </div>

                    @endif

                </div>

            </div>
        </div>



    </div>
@endsection

<script>
    function showTopUpConfirmation(event) {
        event.preventDefault(); // Prevent the form from submitting directly

        // Display the pop-up overlay
        var overlay = document.getElementById("topupConfirmation");
        overlay.style.display = "block";

        // Handle "Yes" button click
        var confirmButton = document.getElementById("confirmTopUpButton");
        confirmButton.addEventListener("click", function() {
            overlay.style.display = "none"; // Hide the pop-up overlay
            event.target.submit(); // Submit the form
        });

        // Handle "No" button click
        var cancelButton = document.getElementById("cancelTopUpButton");
        cancelButton.addEventListener("click", function() {
            overlay.style.display = "none"; // Hide the pop-up overlay
        });
    }
</script>
