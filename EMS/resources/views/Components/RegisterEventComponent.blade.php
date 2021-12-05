<div class="container bootstrap snippets bootdey">
<div class="profile-info col-md-12">
    <div class="panel">
        <div class="panel-body bio-graph-info">
           <center><b> <h1 style="color: white">Confirmation Details</h1></b></center>

           @foreach ($userData as $userData)

            <div class="row">
                <div class="bio-row">
                    <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Name </span>: {{$userData->name}}</p>
                </div>
                <div class="bio-row">
                    <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Phone</span>: {{$userData->phone_number}}</p>
                </div>
            </div>

            @endforeach

                <div>
                    <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Event Name </span>: <span id = "event_name"></span></p>
                </div>
                <div class="">
                    <span style="color: rgb(255, 154, 87); font-size: 18px;">Description </span>
                    <p style="color: white"><span id = "event_des"></span></p>
                </div>

                <div class="">
                  <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Event Type</span>: <span id = "event_type"></span></p>
              </div>

                <div class="">
                    <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Date</span>: <span id = "event_date"></span></p>
                </div>

                <div class="">
                    <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Time</span>: <span id = "event_time"></span></p>
                </div>

                <div class="">
                    <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Venue</span>: <span id = "event_venue"></span></p>
                </div>

                <div class="">
                    <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Registration Fee</span>: <span id = "event_fee"></span></p>
                </div>

                <center><b> <h1 style="color: white">Payment</h1></b></center>
                <div class="row">
                    <div class="col-md-4">
                    <span style="color: white;">Payment Method</span>
                    <input disabled id="EventPaymentMethodId" type="text" class="form-control mb-3" style="background-color: #464646; color: white;">
                    </div>
                    <div class="col-md-4">
                    <span style="color: white">Enter Your Account Number</span>
                    <input id="UserAccountNumberId" type="text" class="form-control mb-3" placeholder="Account Number" style="background-color: #464646; color: white;">
                </div>
                <div class="col-md-4">
                    <span style="color: white">Transaction Number</span>
                    <input id="UserTransactionId" type="text" class="form-control mb-3" placeholder="Transaction ID" style="background-color: #464646; color: white;">
                </div>

                </div>

              <center> <button type="button" id="confirmPaymentBtnID" class="btn btn-primary" style="margin-top: 14px;">Confirm Payment</button></center>

            </div>


    </div>



</div>
</div>
