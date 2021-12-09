
<div class="container bootstrap snippets bootdey">
    <div class="profile-info col-md-12">
<div class="panel">
    <div class="panel-body bio-graph-info">
        <b> <h1 style="color: white">Event Summary</h1></b>

        <div class="row">
            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Event Name</span>: Rumman</p>
            </div>
            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Event Type</span>: 01111</p>
            </div>

            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Event Date</span>: 01111</p>
            </div>
            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Event Time</span>: 01111</p>
            </div>
            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Event Venue</span>: 01111</p>
            </div>
            <div class="bio-row">
                <p style="color: white"><span style="color: rgb(255, 154, 87);">Pay Amount</span>: 01111</p>
            </div>

        </div>

        <div class="limiter">
            <b> <h1 style="color: white">Participants List</h1></b>

                    <div class="table100">
                        <table id="SummaryTable">
                            <thead>
                                <tr class="table100-head">
                                    <th class="column1">User Name</th>
                                    <th class="column2">Phone Number</th>
                                    <th class="column3">Address</th>
                                    <th class="column3">Payment Method</th>
                                    <th class="column4">Payment Amount</th>
                                    <th class="column5">Account Number</th>
                                    <th class="column5">Transaction Number</th>
                                    <th class="column5">Action</th>

                                </tr>
                            </thead>
                            <tbody id = "user_data">
                                    <tr>
                                        <td>x</td>
                                        <td>01220191</td>
                                        <td>axbahx </td>
                                        <td>Bkash</td>
                                        <td>200</td>
                                        <td>0162772</td>
                                        <td>0156544</td>
                                        <td>
                                            <button name="submit" type="submit" data-toggle="modal" data-target="#PaymentApproveModal" class="submit" style="padding: 2px;">Update Status</button>
                                        </td>

                                    </tr>
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
                <label style="float: left;">Status</label>
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

