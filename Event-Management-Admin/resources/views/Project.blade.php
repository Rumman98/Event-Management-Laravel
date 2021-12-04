@extends('layout.app')
@section('title','Projects')
@section('content')
<div id="maindivProject" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-3">
      <button id="AddNewProjectBtnID" class="normal-btn">Add New Project</button>
    <table id="ProjectTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>

          <th class="th-sm">Name</th>
          <th class="th-sm">Project Details</th>
          <th class="th-sm">Update</th>
          <th class="th-sm">Delete</th>

        </tr>
      </thead>
      <tbody id="Project_table">
      </tbody>
    </table>

    </div>
    </div>
    </div>


    <div id="loaderdivProject" class="container">
      <div class="row">
          <div class="col-md-12 text-center p-5">
          <img class="loading-icon m-5" src="{{asset('images/Hourglass.gif')}}">
          </div>
      </div>
  </div>



  <div id="wrongdivProject" class="container d-none">
      <div class="row">
          <div class="col-md-12 text-center p-5">
          <h3>Something went wrong</h3>
          </div>
      </div>
  </div>




  <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="ProjectNameId" type="text" id="" class="form-control mb-3" placeholder="Project Name">
          	 	<input id="ProjectDesId" type="text" id="" class="form-control mb-3" placeholder="Project Description">
    		 	<input id="ProjectLinkId" type="text" id="" class="form-control mb-3" placeholder="Project Link">
                <input id="ProjectImgId" type="text" id="" class="form-control mb-3" placeholder="Project Image">
       		</div>


       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="normal-btn-cancel" data-dismiss="modal">Cancel</button>
        <button  id="ProjectAddConfirmBtn" type="button" class="normal-btn">Save</button>
      </div>
    </div>
  </div>
</div>


<div
  class="modal fade"
  id="Projectdeletemodal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <h6>Do you want to delete?</h6>
          <h5 id="ProjectDeleteID" class=""></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="normal-btn-cancel" data-dismiss="modal">
          No
        </button>
        <button type="button" data-id="" id="Projectdeleteconfirm" class="normal-btn">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="UpdateProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <div class="modal-header">
      <h5 class="modal-title">Update Project</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body  text-center">
     <div id="ProjectEditForm" class="container">
      <h5 id="ProjectEditID" class="d-none"></h5>
       <div class="row">
        <div class="col-md-6">
            <input id="ProjectNameupdateId" type="text" id="" class="form-control mb-3" placeholder="Project Name">
              <input id="ProjectDesupdateId" type="text" id="" class="form-control mb-3" placeholder="Project Description">
            <input id="ProjectLinkupdateId" type="text" id="" class="form-control mb-3" placeholder="Project Link">
           <input id="ProjectImgupdateId" type="text" id="" class="form-control mb-3" placeholder="Project Image">
          </div>
       </div>
     </div>

     <img id="ProjectEditLoader" class="loading-icon m-5" src="{{asset('images/Hourglass.gif')}}">
     <h3 id="ProjectEditWrong" class="d-none">Something went wrong</h3>

    </div>
    <div class="modal-footer">
      <button type="button" class="normal-btn-cancel" data-dismiss="modal">Cancel</button>
      <button  id="ProjectEditConfirmBtn" type="button" class="normal-btn">Save</button>
    </div>
  </div>
</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  getProjectdata();





  function getProjectdata() {
    axios.get('/getprojectdata')
        .then(function(response) {

            if (response.status == 200) {

                $('#maindivProject').removeClass('d-none');
                $('#loaderdivProject').addClass('d-none');
                $('#ProjectTableID').DataTable().destroy();
                $('#Project_table').empty();

                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(
                        "<td>" + dataJSON[i].project_name + "</td>" +
                        "<td>" + dataJSON[i].project_desc + "</td>" +
                        "<td><a class='ProjectEditebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='Projectdeletebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo('#Project_table');
                });

                   //Course delete button

    $('.Projectdeletebtn').click(function() {
        var id = $(this).data('id');

        $('#ProjectDeleteID').html(id);
        $('#Projectdeletemodal').modal('show');

    })

    $('.ProjectEditebtn').click(function() {
        var id = $(this).data('id');
        $('#ProjectEditID').html(id);
        getProjectdetails(id);
        $('#UpdateProjectModal').modal('show');

    })

       $('#ProjectTableID').DataTable({"order":false});
        $('.dataTables_length').addClass('bs-select');

   }
            else {
                $('#loaderdivProject').addClass('d-none');
                $('#wrongdivProject').removeClass('d-none');
            }


        }).catch(function(error) {

        });
    }





    $('#AddNewProjectBtnID').click(function(){

        $('#addProjectModal').modal('show');

    });


    $('#ProjectAddConfirmBtn').click(function(){

      var ProjectName=  $('#ProjectNameId').val();
      var ProjectDes=  $('#ProjectDesId').val();
      var ProjectLink=  $('#ProjectLinkId').val();
      var ProjectImg=  $('#ProjectImgId').val();

      ProjectAdd(ProjectName,ProjectDes,ProjectLink,ProjectImg);
    });





    function ProjectAdd(ProjectName,ProjectDes,ProjectLink,ProjectImg) {

        if(ProjectName.length==0){
            toastr.error('Project Name Is Empty');
        }

        else if(ProjectDes.length==0){
            toastr.error('Project Description Is Empty');

        }

        else if(ProjectLink.length==0){
            toastr.error('Project Link Is Empty');

        }

        else if(ProjectImg.length==0){
            toastr.error('Project Image Is Empty');

        }

        else{
            axios.post('/projectadd', {
                project_name:ProjectName,
                project_desc:ProjectDes,
                project_link:ProjectLink,
                project_img:ProjectImg
            })
            .then(function(response) {
                if (response.status == 200){
                    if (response.data == 1) {
                        $('#addProjectModal').modal('hide');
                        toastr.success('Project Added Successfully');
                        getProjectdata();
                    } else {
                        $('#addProjectModal').modal('hide');
                        toastr.error('Failed');
                        getProjectdata();
                    }
                }

                else{
                    $('#addProjectModal').modal('hide');
                        toastr.error('Failed');

                }

            })
            .catch(function(error) {
                $('#addProjectModal').modal('hide');
                toastr.error('Failed');
        });
        }
        }



    $('#Projectdeleteconfirm').click(function() {
        var id = $('#ProjectDeleteID').html();
        getProjectdelete(id);
        })

        function getProjectdelete(deleteID) {
            axios.post('/projectdelete', {
                    id: deleteID
                })
                .then(function(response) {
                    if (response.data == 1) {
                        $('#Projectdeletemodal').modal('hide');
                        toastr.success('Delete Success');
                        getProjectdata();
                    } else {
                        $('#Projectdeletemodal').modal('hide');
                        toastr.error('Delete Failed');
                        getProjectdata();
                    }
                })
                .catch(function(error) {

                });

            }



    function getProjectdetails(detailsID) {
        axios.post('/projectdetails', {
                id: detailsID
            })
            .then(function(response) {
                if (response.status == 200){
                    $('#ProjectEditForm').removeClass('d-none');
                    $('#ProjectEditLoader').addClass('d-none');


                 var dataJSON = response.data;
                    $('#ProjectNameupdateId').val(dataJSON[0].project_name);
                    $('#ProjectDesupdateId').val(dataJSON[0].project_desc);
                    $('#ProjectLinkupdateId').val(dataJSON[0].project_link);
                    $('#ProjectImgupdateId').val(dataJSON[0].project_img);
                }

                else{
                    $('#ProjectEditLoader').addClass('d-none');
                    $('#ProjectEditWrong').removeClass('d-none');
                }

            })
            .catch(function(error) {
                $('#ProjectEditLoader').addClass('d-none');
                $('#ProjectEditWrong').removeClass('d-none');
        });

        }

        $('#ProjectEditConfirmBtn').click(function() {
            var ProjectID = $('#ProjectEditID').html();
            var ProjectName=  $('#ProjectNameupdateId').val();
            var ProjectDes=  $('#ProjectDesupdateId').val();
            var ProjectLink=  $('#ProjectLinkupdateId').val();
            var ProjectImg=  $('#ProjectImgupdateId').val();
            ProjectUpdate(ProjectID,ProjectName,ProjectDes,ProjectLink,ProjectImg)
            })


            function ProjectUpdate(ProjectID,ProjectName,ProjectDes,ProjectLink,ProjectImg) {

                if(ProjectName.length==0){
                    toastr.error('Project Name Is Empty');
                }

                else if(ProjectDes.length==0){
                    toastr.error('Project Description Is Empty');

                }

                else if(ProjectLink.length==0){
                    toastr.error('Project Link Is Empty');

                }

                else if(ProjectImg.length==0){
                    toastr.error('Project Image Is Empty');

                }


                else{
                axios.post('/projectupdate', {
                    id:ProjectID,
                    project_name:ProjectName,
                    project_desc:ProjectDes,
                    project_link:ProjectLink,
                    project_img:ProjectImg
                })
                .then(function(response) {
                    if (response.status == 200){
                        if (response.data == 1) {
                            $('#UpdateProjectModal').modal('hide');
                            toastr.success('Update Success');
                            getProjectdata();
                        } else {
                            $('#UpdateProjectModal').modal('hide');
                            toastr.error('Update Failed');
                            getProjectdata();
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
