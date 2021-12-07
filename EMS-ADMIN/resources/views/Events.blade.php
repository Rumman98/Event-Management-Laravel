@extends('layout.app')
@section('title','Events')
@section('content')
<div class="container">

    <h1 class="mb-3">Event Details</h1>
    <div class="row">
    <div class="col-md-12 p-3">
    <table id="EventTableID" class="table table-striped table-bordered" cellspacing="0">
      <thead style="background-color: rgb(175, 255, 159)">
        <tr>

          <th class="th-sm">Event Name</th>
          <th class="th-sm">Type</th>
          <th class="th-sm">Time</th>
          <th class="th-sm">Date</th>
          <th class="th-sm">Venue</th>
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
{{-- Event Delete Modal --}}
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


        {{-- Event Details Modal --}}

        <div class="modal fade" id="EventDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <div class="modal-header">
      <h5 class="modal-title">Approve Event</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body ">
     <div id="EventApproveForm" class="container">
      <h5 id="EventApproveID" class="d-none"></h5>
       <div class="row">
         <div class="col-md-6">
        <input disabled id="EventNameId" type="text" class="form-control mb-3" placeholder="Course Name">
        <input disabled id="EventDesId" type="text" class="form-control mb-3" placeholder="Course Description">
         <input disabled id="EventTypeId" type="text" class="form-control mb-3" placeholder="Course Fee">
         <input disabled id="EventTimeId" type="text" class="form-control mb-3" placeholder="Total Enroll">
         <input disabled id="EventDateId" type="text" class="form-control mb-3" placeholder="Total Enroll">
         <input disabled id="EventVenueId" type="text" class="form-control mb-3" placeholder="Total Enroll">
         </div>
         <div class="col-md-6">
            <input disabled id="EventFeeId" type="text" class="form-control mb-3" placeholder="Course Name">
            <input disabled id="EventLastDateId" type="text" class="form-control mb-3" placeholder="Course Description">
        <input disabled id="EventCreatorId" type="text" class="form-control mb-3" placeholder="Course Fee">
        <input disabled id="EventPaymentMethodId" type="text" class="form-control mb-3" placeholder="Total Enroll">
        <input disabled id="EventPayAccountId" type="text" class="form-control mb-3" placeholder="Total Enroll">
        {{-- <select id="EventApprovalStatusId" class="form-control mb-3">
            <option value="Reject">Reject</option>
            <option value="Approved">Approved</option>
        </select> --}}

        <select name="cars" id="cars">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
          </select>
         </div>
       </div>
     </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="normal-btn-cancel" data-dismiss="modal">Cancel</button>
      <button  id="EventApproveConfirmBtn" type="button" class="normal-btn">Approve</button>
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
                $('#EventTableID').DataTable().destroy();
                $('#Event_table').empty();
                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(
                        "<td>" + dataJSON[i].event_name + "</td>" +
                        "<td>" + dataJSON[i].event_type + "</td>" +
                        "<td>" + dataJSON[i].event_time + "</td>" +
                        "<td>" + dataJSON[i].event_date + "</td>" +
                        "<td>" + dataJSON[i].event_venue + "</td>" +
                        "<td>" + dataJSON[i].event_approval + "</td>" +
                        "<td><a class='Eventdeletebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a> <a class='EventDetailsbtn' data-id=" + dataJSON[i].id + "><i class='fas fa-check-square' style='padding:7px;'></i></a></td>"
                        ).appendTo('#Event_table');
                });

    $('.Eventdeletebtn').click(function() {
        let id = $(this).data('id');
        $('#EventDeleteID').html(id);
        $('#Eventdeletemodal').modal('show');

    })

    $('.EventDetailsbtn').click(function() {
        var id = $(this).data('id');
        $('#EventApproveID').html(id);
        getEventdetails(id);
        $('#EventDetailsModal').modal('show');

    })

       $('#EventTableID').DataTable({"order":false});
        $('.dataTables_length').addClass('bs-select');

   }
            else {

            }


        }).catch(function(error) {

        });
    }

    function getEventdetails(detailsID) {
        axios.post('/getEventdetails', {
                id: detailsID
            })
            .then(function(response) {
                if (response.status == 200){

                    var dataJSON = response.data;
                    $('#EventNameId').val(dataJSON[0].event_name);
                    $('#EventDesId').val(dataJSON[0].event_description);
                    $('#EventTypeId').val(dataJSON[0].event_type);
                    $('#EventTimeId').val(dataJSON[0].event_time);
                    $('#EventDateId').val(dataJSON[0].event_date);
                    $('#EventVenueId').val(dataJSON[0].event_venue);
                    $('#EventFeeId').val(dataJSON[0].event_registration_fee);
                    $('#EventLastDateId').val(dataJSON[0].event_reg_last_date);
                    $('#EventCreatorId').val(dataJSON[0].event_creator_phone_no);
                    $('#EventPaymentMethodId').val(dataJSON[0].event_payment_method);
                    $('#EventPayAccountId').val(dataJSON[0].event_pay_acc_no);
                    $('#EventApprovalStatusId').val(dataJSON[0].event_approval);

                }

                else{

                }

            })
            .catch(function(error) {

        });

        }

        $('#EventApproveConfirmBtn').click(function() {
            var EventID = $('#EventApproveID').html();
            var StatusID = $('#EventApprovalStatusId').val();
            ApprovalUpdate(EventID,StatusID);
            })


            function ApprovalUpdate(EventID,StatusID) {


                axios.post('/EventApprovalUpdate', {
                    id:EventID,
                    event_approval:StatusID,
                })
                .then(function(response) {
                    if (response.status == 200){
                        if (response.data == 1) {
                            $('#EventDetailsModal').modal('hide');
                            toastr.success('Update Success');
                            getEventdata();
                        } else {
                            $('#EventDetailsModal').modal('hide');
                            toastr.error('Update Failed');
                            getEventdata();
                        }
                    }

                    else{

                    }

                })
                .catch(function(error) {

                });
                }

        $('#Eventdeleteconfirm').click(function() {
        var id = $('#EventDeleteID').html();
        getEventdelete(id);
        })

        function getEventdelete(deleteID) {
            axios.post('/Eventdelete', {
                    id: deleteID
                })
                .then(function(response) {
                    if (response.data == 1) {
                        $('#Eventdeletemodal').modal('hide');
                        toastr.success('Delete Success');
                        getEventdata();
                    } else {
                        $('#Eventdeletemodal').modal('hide');
                        toastr.error('Delete Failed');
                        getEventdata();
                    }
                })
                .catch(function(error) {

                });

            }



</script>
@endsection
