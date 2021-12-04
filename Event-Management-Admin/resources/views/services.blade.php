@extends('layout.app')
@section('title','Services')
@section('content')
<div id="maindiv" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-5">
<button id="AddNewBtnID" class="normal-btn">Add New Service</button>

    <table id="serviceTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Image</th>
          <th class="th-sm">Name</th>
          <th class="th-sm">Description</th>
          <th class="th-sm">Edit</th>
          <th class="th-sm">Delete</th>
        </tr>
      </thead>
      <tbody id="service_table">

      </tbody>
    </table>
    </div>
    </div>
    </div>



<div id="loaderdiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center p-5">
        <img class="loading-icon m-5" src="{{asset('images/Hourglass.gif')}}">
        </div>
    </div>
</div>



<div id="wrongdiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center p-5">
        <h3>Something went wrong</h3> 
        </div>
    </div>
</div>






<div
  class="modal fade"
  id="deletemodal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <h6>Do you want to delete?</h6>
          <h5 id="serviceDeleteID" class="d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="normal-btn-cancel" data-dismiss="modal">
          No
        </button>
        <button type="button" data-id="" id="servicedeleteconfirm" class="normal-btn">Yes</button>
      </div>
    </div>
  </div>
</div>




<div
  class="modal fade"
  id="editemodal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
        <form id="ServiceEditForm" class="w-100 d-none">
        <h5 id="serviceEditID" class="d-none"></h5>
          <div class="form-outline mb-4">
            <input type="text" id="ServiceNameID" class="form-control" placeholder="Service Name" />
          </div>
        
          <div class="form-outline mb-4">
            <input type="email" id="ServiceDesID" class="form-control" placeholder="Service Description" />
          </div>

          <div class="form-outline mb-4">
            <input type="email" id="ServiceImgID" class="form-control" placeholder="Service Image Link" />
          </div>
      
        </form>

        <img id="ServiceEditLoader" class="loading-icon m-5" src="{{asset('images/Hourglass.gif')}}">
        <h3 id="ServiceEditWrong" class="d-none">Something went wrong</h3> 


      </div>
      <div class="modal-footer">
        <button type="button" class="normal-btn-cancel" data-dismiss="modal">
          Cancel
        </button>
        <button type="button" data-id="" id="serviceEditconfirm" class="normal-btn">Update</button>
      </div>
    </div>
  </div>
</div>


<div
  class="modal fade"
  id="Addmodal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-5 text-center">
        <form id="ServiceAddForm" class="w-100">
          <h6 class="mb-4">Add New Service</h6>
          <div class="form-outline mb-4">
            <input type="text" id="ServiceNameAddID" class="form-control" placeholder="Service Name" />
          </div>
        
          <div class="form-outline mb-4">
            <input type="email" id="ServiceDesAddID" class="form-control" placeholder="Service Description" />
          </div>

          <div class="form-outline mb-4">
            <input type="email" id="ServiceImgAddID" class="form-control" placeholder="Service Image Link" />
          </div>
      
        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="normal-btn-cancel" data-dismiss="modal">
          Cancel
        </button>
        <button type="button" data-id="" id="AddNewID" class="normal-btn">Add New</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
    getservicedata();

//for services table
function getservicedata() {
  axios.get('/getservicedata')
    .then(function(response) {

        if (response.status == 200) {

            $('#maindiv').removeClass('d-none');
            $('#loaderdiv').addClass('d-none');
            $('#serviceTableID').DataTable().destroy();
            $('#service_table').empty();

            var dataJSON = response.data;
            $.each(dataJSON, function(i, item) {
                $('<tr>').html(
                    "<td><img class='table_img' src=" + dataJSON[i].service_img + "</td>" +
                    "<td>" + dataJSON[i].service_name + "</td>" +
                    "<td>" + dataJSON[i].service_des + "</td>" +
                    "<td><a class='serviceEditebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
                    "<td><a class='servicedeletebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>").appendTo('#service_table');
            });

            //services delete button
            $('.servicedeletebtn').click(function() {
                var id = $(this).data('id');

                $('#serviceDeleteID').html(id);
                $('#deletemodal').modal('show');

            })

               //Services Edit
        $('.serviceEditebtn').click(function() {
            var id = $(this).data('id');
            $('#serviceEditID').html(id);
            getservicedetails(id);
            $('#editemodal').modal('show');

        })


        $('#serviceTableID').DataTable({"order":false});
        $('.dataTables_length').addClass('bs-select');


        } 
        else {
            $('#loaderdiv').addClass('d-none');
            $('#wrongdiv').removeClass('d-none');
        }

     


    }).catch(function(error) {

    });   
}

$('#servicedeleteconfirm').click(function() {
var id = $('#serviceDeleteID').html();
getservicedelete(id);
})

function getservicedelete(deleteID) {

axios.post('/servicedelete', {
        id: deleteID
    })
    .then(function(response) {
        if (response.data == 1) {
            $('#deletemodal').modal('hide');
            toastr.success('Delete Success');
            getservicedata();
        } else {
            $('#deletemodal').modal('hide');
            toastr.error('Delete Failed');
            getservicedata();
        }
    })
    .catch(function(error) {

    });

}



function getservicedetails(detailsID) {
axios.post('/servicedetails', {
        id: detailsID  
    })
    .then(function(response) {
        if (response.status == 200){
            $('#ServiceEditForm').removeClass('d-none');
            $('#ServiceEditLoader').addClass('d-none');
           

         var dataJSON = response.data;
            $('#ServiceNameID').val(dataJSON[0].service_name);
            $('#ServiceDesID').val(dataJSON[0].service_des);
            $('#ServiceImgID').val(dataJSON[0].service_img);

        }

        else{
            $('#ServiceEditLoader').addClass('d-none');
            $('#ServiceEditWrong').removeClass('d-none');
        }
      
    })
    .catch(function(error) {
        $('#ServiceEditLoader').addClass('d-none');
        $('#ServiceEditWrong').removeClass('d-none');
});

}


$('#serviceEditconfirm').click(function() {
var id = $('#serviceEditID').html();
var name = $('#ServiceNameID').val();
var des = $('#ServiceDesID').val();
var img = $('#ServiceImgID').val();
serviceUpdate(id,name,des,img);
})

function serviceUpdate(ServiceID,ServiceName, ServiceDes,ServiceImg) {

if(ServiceName.length==0){
toastr.error('Service Name Is Empty');
}

else if(ServiceDes.length==0){
toastr.error('Service Description Is Empty');

}

else if(ServiceImg.length==0){
toastr.error('Service Image Is Empty');

}

else{
axios.post('/serviceupdate', {
    id: ServiceID,
    name:ServiceName,
    des:ServiceDes,
    img:ServiceImg  
})
.then(function(response) {
    if (response.status == 200){
        if (response.data == 1) {
            $('#editemodal').modal('hide');
            toastr.success('Update Success');
            getservicedata();
        } else {
            $('#editemodal').modal('hide');
            toastr.error('Update Failed');
            getservicedata();
        }
    }

    else{
      
    }
  
})
.catch(function(error) {
  
});
}
}

//Service Add New Button Click
$('#AddNewBtnID').click(function(){

$('#Addmodal').modal('show');
});

$('#AddNewID').click(function() {
var name = $('#ServiceNameAddID').val();
var des = $('#ServiceDesAddID').val();
var img = $('#ServiceImgAddID').val();
serviceAdd(name,des,img);
})

//Service Add Function
function serviceAdd(ServiceName, ServiceDes,ServiceImg) {

if(ServiceName.length==0){
    toastr.error('Service Name Is Empty');
}

else if(ServiceDes.length==0){
    toastr.error('Service Description Is Empty');

}

else if(ServiceImg.length==0){
    toastr.error('Service Image Is Empty');

}

else{
    axios.post('/serviceadd', {
        name:ServiceName,
        des:ServiceDes,
        img:ServiceImg  
    })
    .then(function(response) {
        if (response.status == 200){
            if (response.data == 1) {
                $('#Addmodal').modal('hide');
                toastr.success('Add Success');
                getservicedata();
            } else {
                $('#Addmodal').modal('hide');
                toastr.error('Add Failed');
                getservicedata();
            }
        }

        else{
          
        }
      
    })
    .catch(function(error) {
      
});
}
}


</script>
@endsection