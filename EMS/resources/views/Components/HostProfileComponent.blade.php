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
                 <b> <h1 style="color: white">Profile Type<span>:Host</span></h1></b>
                 @foreach ($HostData as $HostData)
                  <div class="row">
                      <div class="bio-row">
                          <p style="color: white"><span style="color: white">Name </span>: {{$HostData->name}}</p>
                      </div>
                      <div class="bio-row">
                          <p style="color: white"><span style="color: white">Email </span>: {{$HostData->email}}</p>
                      </div>

                      <div class="bio-row">
                        <p style="color: white"><span style="color: white">Address</span>: {{$HostData->address}}</p>
                    </div>

                      <div class="bio-row">
                          <p style="color: white"><span style="color: white">Phone</span>: {{$HostData->phone_number}}</p>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                        <button name="submit" type="submit" data-toggle="modal" data-target="#HostProfileModal" class="submit" style="width: 100%">Update Profile</button>
                      </div>
                      <div class="col-md-4">
                          <button name="submit" type="submit" data-toggle="modal" data-target="#HostChngPasswordModal" class="submit" style="width: 100%">Change Password</button>
                                </div>

                      <div class="col-md-4">
                         <a href="{{'/logout'}}"><button onclick="flushmsg()" type="submit" class="submit" style="width: 100%">Logout</button></a>
                      </div>

                  </div>
                  </div>
                  @endforeach
              </div>
          </div>



      </div>


    </div>

    <div class="panel">
        <div class="panel-body bio-graph-info">
           <center><button stype="submit" class="submit" style="width: 30%; margin-bottom: 8px;">Add Events</button></center>

            <div class="limiter">

                        <div class="table100">
                            <table>
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1">Event Name</th>
                                        <th class="column1">Event Description</th>
                                        <th class="column1">Event Type</th>
                                        <th class="column2">Event Time</th>
                                        <th class="column3">Venue</th>
                                        <th class="column4">Registration Amount</th>
                                        <th class="column5">Last Date</th>
                                        <th class="column6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>Batch 13 Reunion</td>
                                            <td>Batch 13 Reunion</td>
                                            <td>Reunion</td>
                                            <td>11 january 2021</td>
                                            <td>Grand Sultan restaurant</td>
                                            <td>200tk</td>
                                            <td>11 january 2021</td>
                                            <td>
                                                <button type="submit" class="submit" style="padding: 11px;">Edit</button>
                                                <button type="submit" class="submit" style="padding: 11px;">Delete</button>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Batch 13 Reunion</td>
                                            <td>Batch 13 Reunion</td>
                                            <td>Reunion</td>
                                            <td>11 january 2021</td>
                                            <td>Grand Sultan restaurant</td>
                                            <td>200tk</td>
                                            <td>11 january 2021</td>
                                            <td>
                                                <button type="submit" class="submit" style="padding: 11px;">Edit</button>
                                                <button type="submit" class="submit" style="padding: 11px;">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Batch 13 Reunion</td>
                                            <td>Batch 13 Reunion</td>
                                            <td>Reunion</td>
                                            <td>11 january 2021</td>
                                            <td>Grand Sultan restaurant</td>
                                            <td>200tk</td>
                                            <td>11 january 2021</td>
                                            <td>
                                                <button type="submit" class="submit" style="padding: 11px;">Edit</button>
                                                <button type="submit" class="submit" style="padding: 11px;">Delete</button>
                                            </td>
                                        </tr>
                                            <tr>
                                                <td>Batch 13 Reunion</td>
                                            <td>Batch 13 Reunion</td>
                                            <td>Reunion</td>
                                            <td>11 january 2021</td>
                                            <td>Grand Sultan restaurant</td>
                                            <td>200tk</td>
                                            <td>11 january 2021</td>
                                            <td>
                                                <button type="submit" class="submit" style="padding: 11px;">Edit</button>
                                                <button type="submit" class="submit" style="padding: 11px;">Delete</button>
                                            </td>
                                            </tr>
                                </tbody>
                            </table>
                        </div>
            </div>

        </div>
    </div>


    {{--Host Profile Update Modal --}}
<div class="modal fade" id="HostProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
         <br>
         <center><span style="color: white">Upload Profile Picture </span></center>
         <input class="form-control mb-3" id="imgInput" type="file" style="background-color: #212121; color: white;">
        <img class="imgPreview mt-3" id="imgPreview" src="{{asset('images/default-image.png')}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>


    {{--Host Change Password Modal --}}

    <div class="modal fade" id="HostChngPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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

        $('#imgInput').change(function () {
            var reader=new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload=function (event) {
               var ImgSource= event.target.result;
                $('#imgPreview').attr('src',ImgSource)
            }
        })
    </script>
