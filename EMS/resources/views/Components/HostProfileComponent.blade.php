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

                 <b> <h1 style="color: white">Profile Type<span>: Host</span></h1></b>

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
                        <button name="submit" type="submit" id="hostEditBtnClick" data-id="{{$HostData->id}}" data-toggle="modal" data-target="#HostProfileModal" class="submit" style="width: 100%">Update Profile</button>
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
           <center><button type="submit" class="submit" data-toggle="modal" data-target="#AddEventModal" style="width: 30%; margin-bottom: 8px;">Add Events</button></center>

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
                                        <th class="column5">Approval</th>
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
                                            <td>Pending</td>
                                            <td>
                                                <button type="submit" class="submit" data-toggle="modal" data-target="#EditEventModal"  style="padding: 11px;">Edit</button>
                                                <button type="submit" class="submit" data-toggle="modal" data-target="#DeleteEventModal" style="padding: 11px;">Delete</button>
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
                                            <td>Pending</td>
                                            <td>
                                                <button type="submit" class="submit" data-toggle="modal" data-target="#EditEventModal"  style="padding: 11px;">Edit</button>
                                                <button type="submit" class="submit" data-toggle="modal" data-target="#DeleteEventModal" style="padding: 11px;">Delete</button>
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
                                            <td>Approved</td>
                                            <td>
                                                <button type="submit" class="submit" data-toggle="modal" data-target="#EditEventModal"  style="padding: 11px;">Edit</button>
                                                <button type="submit" class="submit" data-toggle="modal" data-target="#DeleteEventModal" style="padding: 11px;">Delete</button>
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
                                            <td>Approved</td>
                                            <td>
                                                <button type="submit" class="submit" data-toggle="modal" data-target="#EditEventModal"  style="padding: 11px;">Edit</button>
                                                <button type="submit" class="submit" data-toggle="modal" data-target="#DeleteEventModal" style="padding: 11px;">Delete</button>
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
      <div class="modal-content" style="background-color: #464646">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>

        </div>
        <div class="modal-body" >
          <input type="hidden" id="host_id">
          <input id="HostNameUpdateId" type="text" class="form-control mb-3" placeholder="Name" style="background-color: #464646; color: white;">
          <input id="HostEmailUpdateId" type="text" class="form-control mb-3" placeholder="Email" style="background-color: #464646; color: white;">
          <input id="HostAddressUpdateId" type="text" class="form-control mb-3" placeholder="Address" style="background-color: #464646; color: white;">
          <input id="HostPhoneUpdateId" onclick="notify()" type="text" class="form-control mb-3" placeholder="Phone Number" style="background-color: #464646; color: white;" readonly>
         <br>
         <center><span style="color: white">Upload Profile Picture </span></center>
         <input class="form-control mb-3" id="imgInput" type="file" style="background-color: #464646; color: white;">
        <img class="imgPreview mt-3" id="imgPreview" src="{{asset('images/default-image.png')}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="HostUpdateConfirm" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>


    {{--Host Change Password Modal --}}
@foreach ($HostData as $HostData)

    <div class="modal fade" id="HostChngPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #464646">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>

            </div>
            <div class="modal-body" >
                <input type="hidden" id="host_phone_no" name="" value="{{$value}}">
                <input id="host_old_pass" type="text" class="form-control mb-3" placeholder="Old Password" style="background-color: #464646; color: white;">
                <input id="host_new_pass" type="text" class="form-control mb-3" placeholder="New Password" style="background-color: #464646; color: white;">
              <input id="host_conNewPass" type="text" class="form-control mb-3" placeholder="Confirm New Password" style="background-color: #464646; color: white;">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="host_confirm_pass" class="btn btn-primary">Confirm</button>
            </div>
          </div>
        </div>
      </div>

      @endforeach


{{-- Add Event Modal --}}

    <div class="modal fade" id="AddEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #464646">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Event</h5>

            </div>
            <div class="modal-body" >
                <input id="EventNameId" type="text" class="form-control mb-3" placeholder="Event Name" style="background-color: #464646; color: white;">
                <textarea id="EventDesID" class="form-control mb-3" placeholder="Event Description"  maxlength="60" style="min-width: 100%; background-color: #464646; color: white; margin-top: 5px; margin-bottom: 5px;"></textarea>
                <span style="color: white;">Choose Your Event Type</span>
                <select id="EventTypeId" name="event type" class="form-control mb-3" style="background-color: #464646; color: white; margin-top: 5px; margin-bottom: 5px;">
                    <option value="Reunion">Reunion</option>
                    <option value="Seminar">Seminar</option>
                </select>
            <div class="row">
                <div class="col-md-6">
                <span style="color: white">Select Event Time </span>
                <input id="EventTimeId" type="time" class="form-control mb-3" placeholder="Event Time" style="background-color: #464646; color: white;">
            </div>
            <div class="col-md-6">
                <span style="color: white">Select Event Date </span>
                <input id="EventDateId" type="date" class="form-control mb-3" placeholder="Event Date" style="background-color: #464646; color: white;">
            </div>
            </div>

            <input id="EventVenueId" type="text" class="form-control mb-3" placeholder="Venue" style="background-color: #464646; color: white;">
            <input id="EventRegAmountId" type="text" class="form-control mb-3" placeholder="Event Registration Amount" style="background-color: #464646; color: white; margin-bottom:5px;">
            <span style="color: white;">Registration Last Date</span>
            <input id="EventRegLastDateId" type="date" class="form-control mb-3" placeholder="Event Registration Last Date" style="background-color: #464646; color: white;">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="saveEventBtnID" class="btn btn-primary">Create Event</button>
            </div>
          </div>
        </div>
      </div>



      {{-- Edit Event Modal --}}

      <div class="modal fade" id="EditEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #464646">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Update Event Information</h5>

            </div>
            <div class="modal-body" >
                <input id="EditEventNameId" type="text" class="form-control mb-3" placeholder="Event Name" style="background-color: #464646; color: white;">
                <textarea id="EditEventDesID" class="form-control mb-3" placeholder="Event Description"  maxlength="60" style="min-width: 100%; background-color: #464646; color: white; margin-top: 5px; margin-bottom: 5px;"></textarea>
                <span style="color: white;">Update Your Event Type</span>
                <select id="EditEventTypeId" name="event type" class="form-control mb-3" style="background-color: #464646; color: white; margin-top: 5px; margin-bottom: 5px;">
                    <option value="Reunion">Reunion</option>
                    <option value="Seminar">Seminar</option>
                </select>
            <div class="row">
                <div class="col-md-6">
                <span style="color: white">Update Event Time </span>
                <input id="EditEventTimeId" type="time" class="form-control mb-3" placeholder="Event Time" style="background-color: #464646; color: white;">
            </div>
            <div class="col-md-6">
                <span style="color: white">Update Event Date </span>
                <input id="EditEventDateId" type="date" class="form-control mb-3" placeholder="Event Date" style="background-color: #464646; color: white;">
            </div>
            </div>

            <input id="EditEventVenueId" type="text" class="form-control mb-3" placeholder="Venue" style="background-color: #464646; color: white;">
            <input id="EditEventRegAmountId" type="text" class="form-control mb-3" placeholder="Event Registration Amount" style="background-color: #464646; color: white; margin-bottom:5px;">
            <span style="color: white;">Update Registration Last Date</span>
            <input id="EditEventRegLastDateId" type="date" class="form-control mb-3" placeholder="Event Registration Last Date" style="background-color: #464646; color: white;">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="saveEventBtnID" class="btn btn-primary">Update Event</button>
            </div>
          </div>
        </div>
      </div>


      {{-- Delete Modal --}}

      <div class="modal fade" id="DeleteEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #464646">
            <div class="modal-body" >
                <h4 style="color: white;">Do you want to delete?</h4>
                <h5 id="EventDeleteID" class=""></h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" id="DeleteEventBtnID" class="btn btn-primary">Yes</button>
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

        function notify()
        {
          flash('Phone Number is Not Changeable.',{'bgColor' : '#f74134'});
        }
    </script>
