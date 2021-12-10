<section id="services" class="services service-section">
  <div class="container">
    <div class="section-header">
      <h2 class="wow fadeInDown animated">Running Events</h2>
    </div>
    <div class="row">
      @foreach ($HomeEventData as $HomeEventData)
      <div class="col-md-4 text-center">
        <div id="container">
          <div id="monitor">
            <div id="monitorscreen">
              <h3 style=" font-family: 'Poppins'; color:white; margin-top: revert;">{{$HomeEventData->event_name}}</h3>
              <h5>Event Type : {{$HomeEventData->event_type}}</h5>
              <time style="color: white;">Date : {{$HomeEventData->event_date}}</time>
              <p style="color: white">Event time: <time datetime="">{{$HomeEventData->event_time}}</time></p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

      </div>

      <div id="loadMore" style="margin-bottom: -13px;">
        <a href="{{'/running-events'}}">Check All Events</a>
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
                        <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Event Name </span>: batch 13</p>
                    </div>
                    <div class="">
                        <span style="color: rgb(255, 154, 87); font-size: 18px;">Description </span>
                        <p style="color: white">No matter how authentic your description is, it’s still only content. When you present an event description that is well designed and eye-catching and pair your content strategy with in-person events you are organising, both tactics will be more effective and will result in an increase in your event attendance.
                            Events, by their very nature, are about connections. Through your bright event description, you can boost attendance, sponsorship, or hosting of an event; make new connections; or strengthen the old ones. Learn how to write an event description that will attract the media’s attention.</p>
                    </div>

                    <div class="">
                      <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Event Type</span>: Reunion</p>
                  </div>

                    <div class="">
                        <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Date</span>: 13 january 2022</p>
                    </div>

                    <div class="">
                        <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Time</span>: 5:00 PM</p>
                    </div>

                    <div class="">
                        <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Venue</span>: Grand Sultan</p>
                    </div>

                    <div class="">
                        <p style="color: white"><span style="color: rgb(255, 154, 87);; font-size: 18px;">Registration Fee</span>: 200tk</p>
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

