@extends('layout.app')
@section('title','Hosts')
@section('content')
<div class="container">

    <h1 class="mb-3">Hosts Details</h1>
    <div class="row">
    <div class="col-md-12 p-3">
    <table id="HostTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>

          <th class="th-sm">Name</th>
          <th class="th-sm">Phone Number</th>
          <th class="th-sm">Email</th>
          <th class="th-sm">Address</th>
          <th class="th-sm">Delete</th>

        </tr>
      </thead>
      <tbody id="Host_table">
      </tbody>
    </table>

    </div>
    </div>
    </div>

<div class="modal fade" id="Hostdeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-body">
        <h6>Do you want to delete?</h6>
        <h5 id="HostDeleteID" class=""> </h5>
    </div>
    <div class="modal-footer">
      <button type="button" class="normal-btn-cancel" data-dismiss="modal">
        No
      </button>
      <button type="button" data-id="" id="Hostdeleteconfirm" class="normal-btn">Yes</button>
    </div>
  </div>
</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
getHostdata();


function getHostdata() {
    axios.get('/gethostdata')
        .then(function(response) {

            if (response.status == 200) {
                $('#HostTableID').DataTable().destroy();
                $('#Host_table').empty();
                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {

                    $('<tr>').html(
                        "<td>" + dataJSON[i].name + "</td>" +
                        "<td>" + dataJSON[i].phone_number + "</td>" +
                        "<td>" + dataJSON[i].email + "</td>" +
                        "<td>" + dataJSON[i].address + "</td>" +
                        "<td><a class='Hostdeletebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo('#Host_table');
                });

    $('.Hostdeletebtn').click(function() {
        let id = $(this).data('id');
        $('#HostDeleteID').html(id);
        $('#Hostdeletemodal').modal('show');

    })

       $('#HostTableID').DataTable({"order":false});
        $('.dataTables_length').addClass('bs-select');

   }
            else {

            }


        }).catch(function(error) {

        });
    }


    $('#Hostdeleteconfirm').click(function() {
        var id = $('#HostDeleteID').html();
        getHostdelete(id);
        })

        function getHostdelete(deleteID) {
            axios.post('/hostdelete', {
                    id: deleteID
                })
                .then(function(response) {
                    if (response.data == 1) {
                        $('#Hostdeletemodal').modal('hide');
                        toastr.success('Delete Success');
                        getHostdata();
                    } else {
                        $('#Coursedeletemodal').modal('hide');
                        toastr.error('Delete Failed');
                        getHostdata();
                    }
                })
                .catch(function(error) {

                });

            }

</script>

@endsection
