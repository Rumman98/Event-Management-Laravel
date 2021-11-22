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
                      <button name="submit" type="submit" class="submit" style="width: 100%">Update Profile</button>
                    </div>
                    <div class="bio-row">
                        <button name="submit" type="submit" class="submit" style="width: 100%">Change Password</button>
                              </div>

                    <div class="bio-row">
                       <a href="{{'/logout'}}"><button type="submit" class="submit" style="width: 100%">Logout</button></a>
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
    </div>
