
<div class="container bootstrap snippets bootdey">
    <div class="row">
      <div class="profile-nav col-md-3">
          <div class="panel">
              <div class="user-heading round">
                  <a href="#">
                      <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                  </a>
              </div>
          </div>
      </div>
      <div class="profile-info col-md-9">
          <div class="panel">
              <div class="panel-body bio-graph-info">
                 <b> <h1 style="color: white">Profile Type<span>: User</span></h1></b>
                 @foreach ($UserData as $UserData)
                  <div class="row">
                      <div class="bio-row">
                          <p style="color: white"><span style="color: white">Name </span>: {{$UserData->name}}</p>
                      </div>
                      <div class="bio-row">
                          <p style="color: white"><span style="color: white">Email </span>: {{$UserData->email}}</p>
                      </div>

                      <div class="bio-row">
                        <p style="color: white"><span style="color: white">Address</span>: {{$UserData->address}}</p>
                    </div>

                      <div class="bio-row">
                          <p style="color: white"><span style="color: white">Phone</span>: {{$UserData->phone_number}}</p>
                      </div>


                      <div class="bio-row">
                      <button name="submit" type="submit" data-toggle="modal" data-target="#ProfileModal" class="submit" style="width: 100%">Update Profile</button>
                    </div>
                    <div class="bio-row">
                        <button name="submit" type="submit" data-toggle="modal" data-target="#ChngPasswordModal" class="submit" style="width: 100%">Change Password</button>
                              </div>

                    <div class="bio-row">
                       <a href="{{'/logout'}}"><button onclick="flushmsg()" type="submit" class="submit" style="width: 100%">Logout</button></a>
                    </div>
                  </div>
                  @endforeach
              </div>
          </div>



      </div>
    </div>

    <div class="panel">
        <div class="panel-body bio-graph-info">
            <b> <h1 style="color: white">Your Events</h1></b>

            <div class="limiter">

                        <div class="table100">
                            <table>
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1">Event Name</th>
                                        <th class="column2">Event Time</th>
                                        <th class="column3">Venue</th>
                                        <th class="column4">Payment Amount</th>
                                        <th class="column5">Confirmation Status</th>
                                        <th class="column6">Invitation Card</th>
                                    </tr>
                                </thead>
                                <tbody id = "user_data">
                                        <tr>
                                            <td>Batch 13 Reunion</td>
                                            <td>11 january 2021</td>
                                            <td>Grand Sultan restaurant</td>
                                            <td>200tk</td>
                                            <td>Pending</td>
                                            <td><button type="submit" class="submit" style="width: 82%; padding: 11px;">Download Invitation Card</button></td>

                                        </tr>
                                        <tr>
                                            <td>Batch 13 Reunion</td>
                                            <td>11 january 2021</td>
                                            <td>Grand Sultan restaurant</td>
                                            <td>200tk</td>
                                            <td>Pending</td>
                                            <td><button type="submit" class="submit" style="width: 82%; padding: 11px;">Download Invitation Card</button></td>                                        </tr>
                                        <tr>
                                            <td>Batch 13 Reunion</td>
                                            <td>11 january 2021</td>
                                            <td>Grand Sultan restaurant</td>
                                            <td>200tk</td>
                                            <td>Approved</td>
                                            <td><button type="submit" class="submit" style="width: 82%; padding: 11px;">Download Invitation Card</button></td>                                        </tr>
                                        <tr>
                                            <td>Batch 13 Reunion</td>
                                            <td>11 january 2021</td>
                                            <td>Grand Sultan restaurant</td>
                                            <td>200tk</td>
                                            <td>Approved</td>
                                            <td><button type="submit" class="submit" style="width: 82%; padding: 11px;">Download Invitation Card</button></td>                                        </tr>

                                </tbody>
                            </table>
                        </div>
            </div>

        </div>
    </div>

{{-- Profile Update Modal --}}
<div class="modal fade" id="ProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #212121">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>

        </div>
        <div class="modal-body" >
            <input id="ProfileNameUpdateId" type="text" class="form-control mb-3" placeholder="Name" style="background-color: #212121; color: white;">
            <input id="ProfileEmailUpdateId" type="text" class="form-control mb-3" placeholder="Email" style="background-color: #212121; color: white;">
          <input id="ProfileAddressUpdateId" type="text" class="form-control mb-3" placeholder="Address" style="background-color: #212121; color: white;">
         <input id="ProfilePhoneUpdateId" type="text" class="form-control mb-3" placeholder="Phone Number" style="background-color: #212121; color: white;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


  {{-- Change Password Modal --}}

  <div class="modal fade" id="ChngPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #212121">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>

        </div>
        <div class="modal-body" >
            <input id="ProfileNameUpdateId" type="text" class="form-control mb-3" placeholder="Old Password" style="background-color: #212121; color: white;">
            <input id="ProfileEmailUpdateId" type="text" class="form-control mb-3" placeholder="New Password" style="background-color: #212121; color: white;">
          <input id="ProfileAddressUpdateId" type="text" class="form-control mb-3" placeholder="Confirm New Password" style="background-color: #212121; color: white;">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Confirm</button>
        </div>
      </div>
    </div>
  </div>

    </div>


    <script>
        function flushmsg(){
            flash('Successfully Logout',{'bgColor' : '#00b859'});
        }

    </script>
