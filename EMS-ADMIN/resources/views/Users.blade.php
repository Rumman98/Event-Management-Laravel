@extends('layout.app')
@section('title','Users')
@section('content')
<h1 class="mb-3">User Details</h1>
<div class="row">
<div class="col-md-12 p-3">
<table id="UserTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>

      <th class="th-sm">Name</th>
      <th class="th-sm">Phone Number</th>
      <th class="th-sm">Email</th>
      <th class="th-sm">Address</th>
      <th class="th-sm">Delete</th>

    </tr>
  </thead>
  <tbody id="user_table">
  </tbody>
</table>

</div>
</div>
</div>



<div
class="modal fade"
id="userdeletemodal"
tabindex="-1"
aria-labelledby="exampleModalLabel"
aria-hidden="true"
>
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
    <h6>Do you want to delete?</h6>
    <h5 id="UserDeleteID" class=""> </h5>
</div>
<div class="modal-footer">
  <button type="button" class="normal-btn-cancel" data-dismiss="modal">
    No
  </button>
  <button type="button" data-id="" id="Userdeleteconfirm" class="normal-btn">Yes</button>
</div>
</div>
</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
getHostdata();


function getHostdata() {
axios.get('/getuserdata')
    .then(function(response) {

        if (response.status == 200) {
            var dataJSON = response.data;
            $.each(dataJSON, function(i, item) {
                $('<tr>').html(
                    "<td>" + dataJSON[i].name + "</td>" +
                    "<td>" + dataJSON[i].phone_number + "</td>" +
                    "<td>" + dataJSON[i].email + "</td>" +
                    "<td>" + dataJSON[i].address + "</td>" +
                    "<td><a class='Userdeletebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#user_table');
            });


$('.Hostdeletebtn').click(function() {
    var id = $(this).data('id');
    $('#UserDeleteID').html(id);
    $('#userdeletemodal').modal('show');

})

   $('#UserTableID').DataTable({"order":false});
    $('.dataTables_length').addClass('bs-select');

}
        else {

        }


    }).catch(function(error) {

    });
}


$('#Userdeleteconfirm').click(function() {
    var id = $('#UserDeleteID').html();
    getuserdelete(id);
    })

    function getuserdelete(deleteID) {
        axios.post('/userdelete', {
                id: deleteID
            })
            .then(function(response) {
                if (response.data == 1) {
                    $('#userdeletemodal').modal('hide');
                    toastr.success('Delete Success');
                    getuserdata();
                } else {
                    $('#userdeletemodal').modal('hide');
                    toastr.error('Delete Failed');
                    getuserdata();
                }
            })
            .catch(function(error) {

            });

        }

</script>

@endsection



