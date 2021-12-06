@extends('layout.app')
@section('title','Events')
@section('content')
<div class="container">

    <h1 class="mb-3">Event Details</h1>
    <div class="row" style="margin-left: -36px;">
    <div class="col-md-12 ">
    <table id="EventTableID" class="table table-striped table-bordered" cellspacing="0">
      <thead>
        <tr>

          <th class="th-sm">Event Name</th>
          <th class="th-sm">Description</th>
          <th class="th-sm">Type</th>
          <th class="th-sm">Time</th>
          <th class="th-sm">Date</th>
          <th class="th-sm">Venue</th>
          <th class="th-sm">Fee</th>
          <th class="th-sm">Last Date</th>
          <th class="th-sm">Creator Number</th>
          <th class="th-sm">Payment Method</th>
          <th class="th-sm">Pay Account</th>
          <th class="th-sm">Approval</th>
          <th class="th-sm">Action</th>

        </tr>
      </thead>
      <tbody id="Event_table">
      </tbody>
    </table>

    </div>
    </div>
    </div>

    <div class="modal fade" id="Eventdeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
                <h6>Do you want to delete?</h6>
                <h5 id="EventDeleteID" class=""> </h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="normal-btn-cancel" data-dismiss="modal">
                No
              </button>
              <button type="button" data-id="" id="Eventdeleteconfirm" class="normal-btn">Yes</button>
            </div>
          </div>
        </div>
        </div>

@endsection

@section('script')
<script type="text/javascript">
getEventdata();

function getEventdata() {
    axios.get('/getEventsdata')
        .then(function(response) {

            if (response.status == 200) {
                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(
                        "<td>" + dataJSON[i].event_name + "</td>" +
                        "<td>" + dataJSON[i].event_description + "</td>" +
                        "<td>" + dataJSON[i].event_type + "</td>" +
                        "<td>" + dataJSON[i].event_time + "</td>" +
                        "<td>" + dataJSON[i].event_date + "</td>" +
                        "<td>" + dataJSON[i].event_venue + "</td>" +
                        "<td>" + dataJSON[i].event_registration_fee + "</td>" +
                        "<td>" + dataJSON[i].event_reg_last_date + "</td>" +
                        "<td>" + dataJSON[i].event_creator_phone_no + "</td>" +
                        "<td>" + dataJSON[i].event_payment_method + "</td>" +
                        "<td>" + dataJSON[i].event_pay_acc_no + "</td>" +
                        "<td>" + dataJSON[i].event_approval + "</td>" +
                        "<td><a class='Eventdeletebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo('#Event_table');
                });

    $('.Eventdeletebtn').click(function() {
        let id = $(this).data('id');
        $('#EventDeleteID').html(id);
        $('#Eventdeletemodal').modal('show');

    })

       $('#EventTableID').DataTable({"order":false});
        $('.dataTables_length').addClass('bs-select');

   }
            else {

            }


        }).catch(function(error) {

        });
    }


</script>
@endsection
