<section id="services" class="services service-section">
    <div class="container">
      <div class="row">

        @foreach ($eventData as $eventData)  
        <div class="col-md-4 col-sm-6 services text-center">
          <div class="services-content">
            <h4>{{$eventData->event_name}}</h4>
            <h6 style="overflow: hidden;text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4;line-clamp: 2; -webkit-box-orient: vertical;">{{$eventData->event_description}}</h6>
            <p>Event time on <time datetime="">{{$eventData->event_time}}</time>.</p>
            <button type="button" id="ViewEventDetailsId" class="btn btn-primary" data-id="{{$eventData->id}}" data-toggle="modal" data-target="#ShowEventDetailsModal">View Details</button>
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
              <a href="{{'/register-event'}}"><button type="submit" id="RegisterEventID" class="btn btn-primary">Register This Event</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>

