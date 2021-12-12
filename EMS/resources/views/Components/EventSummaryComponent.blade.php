
<div class="container bootstrap snippets bootdey">
    <div class="profile-info col-md-12">
<div class="panel">
    <div class="panel-body bio-graph-info">
        <b> <h1 style="color: white">Event Summary</h1></b>

        <div class="row">
            @foreach ($EventInfo as $EventInfo)
            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Event Name</span>: {{$EventInfo->event_name}}</p>
            </div>
            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Event Type</span>: {{$EventInfo->event_type}}</p>
            </div>

            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Event Date</span>: {{$EventInfo->event_date}}</p>
            </div>
            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Event Time</span>: {{$EventInfo->event_time}}</p>
            </div>
            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Event Venue</span>: {{$EventInfo->event_venue}}</p>
            </div>
            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Pay Amount</span>: {{$EventInfo->event_registration_fee}}</p>
            </div>
            @endforeach
        </div>

        <div class="limiter">
            <b> <h1 style="color: white">Participants List</h1></b>

                    <div class="table100">
                        <table id="SummaryTable">
                            <thead>
                                <tr class="table100-head">
                                    <th class="column1">User Name</th>
                                    <th class="column2">Phone Number</th>
                                    <th class="column3">Payment Method</th>
                                    <th class="column5">Account Number</th>
                                    <th class="column5">Transaction Number</th>
                                    <th class="column5">Status</th>
                                    <th class="column5">Action</th>

                                </tr>
                            </thead>
                            <tbody id = "user_data">
                                @foreach ($EventMemberDetails as $EventMemberDetails)
                                    <tr>
                                        <td>{{$EventMemberDetails->user_name}}</td>
                                        <td>{{$EventMemberDetails->user_phone_no}}</td>
                                        <td>{{$EventMemberDetails->event_payment_method}}</td>
                                        <td>{{$EventMemberDetails->user_acc_no}}</td>
                                        <td>{{$EventMemberDetails->transaction_no}}</td>
                                        <td>{{$EventMemberDetails->stutus}}</td>
                                        <td>
                                            <button name="submit" type="submit" data-id="{{$EventMemberDetails->user_phone_no}}" data-name="{{$EventMemberDetails->transaction_no}}" data-toggle="modal" data-target="#PaymentApproveModal" class="submit status" >Update Status</button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </div>



    </div>
</div>
</div>
</div>


<div class="modal fade" id="PaymentApproveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #464646">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Update status</h5>
        <div class="modal-body text-center">
          <h5 id="PaymentApproveID" class="d-none"></h5>
          <input type='hidden' id='user_phone_no'>
          <input type='hidden' id='transactionNoId'>

                <label style="float: left;">Current Status</label>
            <input disabled id="PaymentApprovalStatusId" type="text" class="form-control mb-3">
                <label style="float: left;">Update</label>
            <select id="PaymentApprovalStatusUpdate" class="form-control mb-3" aria-label="Default select example">
                <option value="Rejected">Rejected</option>
                <option value="Approved">Approved</option>
            </select>
           </div>
         </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="PaymentStatussUpdateConfirm" class="btn btn-primary">Update</button>
        </div>
    </div>
      </div>
</div>

