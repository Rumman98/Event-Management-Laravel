@extends('layout.app')
@section('title','Courses')
@section('content')
<div id="maindivCourse" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-3">
      <button id="AddNewCourseBtnID" class="normal-btn">Add New Course</button>
    <table id="CourseTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>

          <th class="th-sm">Name</th>
          <th class="th-sm">Course Fee</th>
          <th class="th-sm">Class</th>
          <th class="th-sm">Enrollment</th>
          <th class="th-sm">Details</th>
          <th class="th-sm">Update</th>
          <th class="th-sm">Delete</th>

        </tr>
      </thead>
      <tbody id="course_table">
      </tbody>
    </table>
    
    </div>
    </div>
    </div>


    <div id="loaderdivCourse" class="container">
      <div class="row">
          <div class="col-md-12 text-center p-5">
          <img class="loading-icon m-5" src="{{asset('images/Hourglass.gif')}}">
          </div>
      </div>
  </div>
  
  
  
  <div id="wrongdivCourse" class="container d-none">
      <div class="row">
          <div class="col-md-12 text-center p-5">
          <h3>Something went wrong</h3> 
          </div>
      </div>
  </div>




  <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="CourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="CourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="CourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
     			<input id="CourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="CourseClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
     			<input id="CourseLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
     			<input id="CourseImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="normal-btn-cancel" data-dismiss="modal">Cancel</button>
        <button  id="CourseAddConfirmBtn" type="button" class="normal-btn">Save</button>
      </div>
    </div>
  </div>
</div>


<div
  class="modal fade"
  id="Coursedeletemodal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <h6>Do you want to delete?</h6>
          <h5 id="CourseDeleteID" class="d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="normal-btn-cancel" data-dismiss="modal">
          No
        </button>
        <button type="button" data-id="" id="Coursedeleteconfirm" class="normal-btn">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="UpdateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <div class="modal-header">
      <h5 class="modal-title">Update Course</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body  text-center">
     <div id="CourseEditForm" class="container">
      <h5 id="CourseEditID" class="d-none"></h5>
       <div class="row">
         <div class="col-md-6">
             <input id="CourseNameupdateId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
             <input id="CourseDesupdateId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
         <input id="CourseFeeupdateId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
         <input id="CourseEnrollupdateId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
         </div>
         <div class="col-md-6">
         <input id="CourseClassupdateId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
         <input id="CourseLinkupdateId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
         <input id="CourseImgupdateId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
         </div>
       </div>
     </div>

     <img id="CourseEditLoader" class="loading-icon m-5" src="{{asset('images/Hourglass.gif')}}">
     <h3 id="CourseEditWrong" class="d-none">Something went wrong</h3> 

    </div>
    <div class="modal-footer">
      <button type="button" class="normal-btn-cancel" data-dismiss="modal">Cancel</button>
      <button  id="CourseEditConfirmBtn" type="button" class="normal-btn">Save</button>
    </div>
  </div>
</div>
</div>
@endsection


@section('script')
<script type="text/javascript">
  getCoursedata();


  function getCoursedata() {
    axios.get('/getcoursedata')
        .then(function(response) {
    
            if (response.status == 200) {
     
                $('#maindivCourse').removeClass('d-none');
                $('#loaderdivCourse').addClass('d-none');
                $('#CourseTableID').DataTable().destroy();
                $('#course_table').empty();

                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(
                        "<td>" + dataJSON[i].course_name + "</td>" +
                        "<td>" + dataJSON[i].course_fee + "</td>" +
                        "<td>" + dataJSON[i].course_totalclass + "</td>" +
                        "<td>" + dataJSON[i].course_totalenroll + "</td>" +
                        "<td><a class='CourseViewDetailsbtn' data-id=" + dataJSON[i].id + "><i class='fas fa-eye'></i></a></td>" +
                        "<td><a class='CourseEditebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='Coursedeletebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo('#course_table');
                });

                   //Course delete button

    $('.Coursedeletebtn').click(function() {
        var id = $(this).data('id');

        $('#CourseDeleteID').html(id);
        $('#Coursedeletemodal').modal('show');

    })

    $('.CourseEditebtn').click(function() {
        var id = $(this).data('id');
        $('#CourseEditID').html(id);
        getCoursedetails(id);
        $('#UpdateCourseModal').modal('show');

    })

       $('#CourseTableID').DataTable({"order":false});
        $('.dataTables_length').addClass('bs-select');

   } 
            else {
                $('#loaderdivCourse').addClass('d-none');
                $('#wrongdivCourse').removeClass('d-none');
            }

           
        }).catch(function(error) {
    
        });
    }

   



    $('#AddNewCourseBtnID').click(function(){

        $('#addCourseModal').modal('show');

    });


    $('#CourseAddConfirmBtn').click(function(){

      var CourseName=  $('#CourseNameId').val();
      var CourseDes=  $('#CourseDesId').val();
      var CourseFee=  $('#CourseFeeId').val();
      var CourseEnroll=  $('#CourseEnrollId').val();
      var CourseClass=  $('#CourseClassId').val();
      var CourseLink= $('#CourseLinkId').val();
      var CourseImg=  $('#CourseImgId').val();
      CourseAdd(CourseName, CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg);
    });


    


    function CourseAdd(CourseName, CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg) {

        if(CourseName.length==0){
            toastr.error('Course Name Is Empty');
        }
        
        else if(CourseDes.length==0){
            toastr.error('Course Description Is Empty');
        
        }
        
        else if(CourseFee.length==0){
            toastr.error('Course Fee Is Empty');
        
        }

        else if(CourseEnroll.length==0){
            toastr.error('Course Enrollment Is Empty');
        
        }

        else if(CourseClass.length==0){
            toastr.error('Course Class Is Empty');
        
        }

        else if(CourseLink.length==0){
            toastr.error('Course Link Is Empty');
        
        }

        else if(CourseImg.length==0){
            toastr.error('Course Image Is Empty');
        
        }
        
        else{
            axios.post('/courseadd', {
                course_name:CourseName,
                course_des:CourseDes,
                course_fee:CourseFee,
                course_totalenroll:CourseEnroll,
                course_totalclass:CourseClass,
                course_link:CourseLink,
                course_img:CourseImg

            })
            .then(function(response) {
                if (response.status == 200){
                    if (response.data == 1) {
                        $('#addCourseModal').modal('hide');
                        toastr.success('Course Added Successfully');
                        getCoursedata();
                    } else {
                        $('#addCourseModal').modal('hide');
                        toastr.error('Failed');
                        getCoursedata();
                    }
                }
        
                else{
                    $('#addCourseModal').modal('hide');
                        toastr.error('Failed');
                  
                }
              
            })
            .catch(function(error) {
                $('#addCourseModal').modal('hide');
                toastr.error('Failed');
        });
        }
        }


        
    $('#Coursedeleteconfirm').click(function() {
        var id = $('#CourseDeleteID').html();
        getCoursedelete(id);
        })

        function getCoursedelete(deleteID) {
            axios.post('/coursedelete', {
                    id: deleteID
                })
                .then(function(response) {
                    if (response.data == 1) {
                        $('#Coursedeletemodal').modal('hide');
                        toastr.success('Delete Success');
                        getCoursedata();
                    } else {
                        $('#Coursedeletemodal').modal('hide');
                        toastr.error('Delete Failed');
                        getCoursedata();
                    }
                })
                .catch(function(error) {
            
                });
            
            }


    
    function getCoursedetails(detailsID) {
        axios.post('/coursedetails', {
                id: detailsID  
            })
            .then(function(response) {
                if (response.status == 200){
                    $('#CourseEditForm').removeClass('d-none');
                    $('#CourseEditLoader').addClass('d-none');
                   
        
                 var dataJSON = response.data;
                    $('#CourseNameupdateId').val(dataJSON[0].course_name);
                    $('#CourseDesupdateId').val(dataJSON[0].course_des);
                    $('#CourseFeeupdateId').val(dataJSON[0].course_fee);
                    $('#CourseEnrollupdateId').val(dataJSON[0].course_totalenroll);
                    $('#CourseClassupdateId').val(dataJSON[0].course_totalclass);
                    $('#CourseLinkupdateId').val(dataJSON[0].course_link);
                    $('#CourseImgupdateId').val(dataJSON[0].course_img);
        
                }
        
                else{
                    $('#CourseEditLoader').addClass('d-none');
                    $('#CourseEditWrong').removeClass('d-none');
                }
              
            })
            .catch(function(error) {
                $('#CourseEditLoader').addClass('d-none');
                $('#CourseEditWrong').removeClass('d-none');
        });
        
        }

        $('#CourseEditConfirmBtn').click(function() {
            var CourseID = $('#CourseEditID').html();
            var CourseName=  $('#CourseNameupdateId').val();
            var CourseDes=  $('#CourseDesupdateId').val();
            var CourseFee=  $('#CourseFeeupdateId').val();
            var CourseEnroll=  $('#CourseEnrollupdateId').val();
            var CourseClass=  $('#CourseClassupdateId').val();
            var CourseLink= $('#CourseLinkupdateId').val();
            var CourseImg=  $('#CourseImgupdateId').val();
            CourseUpdate(CourseID,CourseName, CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg)
            })


            function CourseUpdate(CourseID,CourseName, CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg) {

                if(CourseName.length==0){
                    toastr.error('Course Name Is Empty');
                }
                
                else if(CourseDes.length==0){
                    toastr.error('Course Description Is Empty');
                
                }
                
                else if(CourseFee.length==0){
                    toastr.error('Course Fee Is Empty');
                
                }
            
                else if(CourseEnroll.length==0){
                    toastr.error('Course Enrollment Is Empty');
                
                }
            
                else if(CourseClass.length==0){
                    toastr.error('Course Class Is Empty');
                
                }
            
                else if(CourseLink.length==0){
                    toastr.error('Course Link Is Empty');
                
                }
            
                else if(CourseImg.length==0){
                    toastr.error('Course Image Is Empty');
                
                }
                
                else{
                axios.post('/courseupdate', {
                    id:CourseID,
                    course_name:CourseName,
                    course_des:CourseDes,
                    course_fee:CourseFee,
                    course_totalenroll:CourseEnroll,
                    course_totalclass:CourseClass,
                    course_link:CourseLink,
                    course_img:CourseImg 
                })
                .then(function(response) {
                    if (response.status == 200){
                        if (response.data == 1) {
                            $('#UpdateCourseModal').modal('hide');
                            toastr.success('Update Success');
                            getCoursedata();
                        } else {
                            $('#UpdateCourseModal').modal('hide');
                            toastr.error('Update Failed');
                            getCoursedata();
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