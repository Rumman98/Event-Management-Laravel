@extends('layout.app')
@section('title','Contact')

@section('content')
<div id="maindivContact" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-3">
    <table id="ContactTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Contact Name</th>
          <th class="th-sm">Mobile Number</th>
          <th class="th-sm">Email</th>
          <th class="th-sm">Message</th>
          <th class="th-sm">Delete</th>
        </tr>
      </thead>
      <tbody id="Contact_table">
      </tbody>
    </table>
    
    </div>
    </div>
    </div>


    <div id="loaderdivContact" class="container">
        <div class="row">
            <div class="col-md-12 text-center p-5">
            <img class="loading-icon m-5" src="{{asset('images/Hourglass.gif')}}">
            </div>
        </div>
    </div>
    
    
    
    <div id="wrongdivContact" class="container d-none">
        <div class="row">
            <div class="col-md-12 text-center p-5">
            <h3>Something went wrong</h3> 
            </div>
        </div>
    </div>


    <div
  class="modal fade"
  id="Contactdeletemodal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <h6>Do you want to delete?</h6>
          <h5 id="ContactDeleteID" class="d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="normal-btn-cancel" data-dismiss="modal">
          No
        </button>
        <button type="button" data-id="" id="Contactdeleteconfirm" class="normal-btn">Yes</button>
      </div>
    </div>
  </div>
</div>
    
@endsection

@section('script')
<script type="text/javascript">
    getContactdata();
    function getContactdata() {
    axios.get('/getcontactdata')
        .then(function(response) {
    
            if (response.status == 200) {
                $('#maindivContact').removeClass('d-none');
                $('#loaderdivContact').addClass('d-none');
                $('#ContactTableID').DataTable().destroy();
                $('#Contact_table').empty();

                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(
                        "<td>" + dataJSON[i].contact_name + "</td>" +
                        "<td>" + dataJSON[i].contact_mobile + "</td>" +
                        "<td>" + dataJSON[i].contact_email + "</td>" +
                        "<td>" + dataJSON[i].contact_message + "</td>" +
                        "<td><a class='Contactdeletebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo('#Contact_table');
                });
    $('.Contactdeletebtn').click(function() {
        var id = $(this).data('id');
        $('#ContactDeleteID').html(id);
        $('#Contactdeletemodal').modal('show');

    })

       $('#ContactTableID').DataTable({"order":false});
        $('.dataTables_length').addClass('bs-select');
   } 
            else {
                $('#loaderdivContact').addClass('d-none');
                $('#wrongdivContact').removeClass('d-none');
            }

           
        }).catch(function(error) {
    
        });
    }

    $('#Contactdeleteconfirm').click(function() {
        var id = $('#ContactDeleteID').html();
        getContactdelete(id);
        })

        function getContactdelete(deleteID) {
            axios.post('/contactdelete', {
                    id: deleteID
                })
                .then(function(response) {
                    if (response.data == 1) {
                        $('#Contactdeletemodal').modal('hide');
                        toastr.success('Delete Success');
                        getContactdata();
                    } else {
                        $('#Contactdeletemodal').modal('hide');
                        toastr.error('Delete Failed');
                        getContactdata();
                    }
                })
                .catch(function(error) {
            
                });
            
            }
    </script>
@endsection