<section id="services" class="services service-section">
    <div class="container">
      <div class="row">

        @foreach ($eventData as $eventData)
        <div class="col-md-4 text-center">
          <div class="services-content">
            <h3 style=" font-family: 'Poppins'; color:white;">{{$eventData->event_name}}</h3>
            <h5>Event Type : {{$eventData->event_type}}</h5>
            <time>Date : {{$eventData->event_date}}</time>
            <p>Event time: <time datetime="12:00">{{$eventData->event_time}}</time></p>
            <a id='' class='ViewEventDetailsClass submit'  data-id="{{$eventData->id}}" style="padding-block: 7px;">View Details</a>
          </div>
        </div>
        @endforeach

      </div>

{{-- Show Event Details Modal --}}
      <div class="modal fade" id="ShowEventDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="border-radius: 10px;">
        <div class="modalbg"></div>
        <div class="modalbg modalbg2"></div>
        <div class="modalbg modalbg3"></div>
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #464646">
            <div class="modal-header" style="background-color: #464646;">
              <h5 class="modal-title" id="exampleModalLongTitle" style="color: rgb(255, 154, 87);">Details</h5>

            </div>
            <div class="modal-body" >

                <div class="row" style="margin-right: 40px; margin-left: 40px;">
                    <div class="">
                        <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Event Name </span>: <span id='event_name'></span> </p>
                    </div>
                    <div class="">
                        <span style="color: rgb(255, 154, 87); font-size: 18px;">Description </span>
                        <p style="color: white" id='event_des'></p>
                    </div>

                    <div class="">
                      <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Event Type</span>: <span id='event_type'></span></p>
                  </div>

                    <div class="">
                        <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Date</span>: <span id='event_date'></p>
                    </div>

                    <div class="">
                        <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Time</span>: <span id='event_time'></p>
                    </div>

                    <div class="">
                        <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Venue</span>: <span id='event_venue'></p>
                    </div>

                    <div class="">
                        <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Registration Fee</span>: <span id='event_fee'></p>
                    </div>


                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a href="{{'/register-event'}}" id="RegisterEventID" class="btn btn-primary">Register This Event</a>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>
