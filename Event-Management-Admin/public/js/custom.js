
function getReviewdata() {
    axios.get('/getreviewdata')
        .then(function(response) {
    
            if (response.status == 200) {
     
                $('#maindivReview').removeClass('d-none');
                $('#loaderdivReview').addClass('d-none');
                $('#ReviewTableID').DataTable().destroy();
                $('#Review_table').empty();

                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(
                        "<td>" + dataJSON[i].name + "</td>" +
                        "<td>" + dataJSON[i].des + "</td>" +
                        "<td><a class='ReviewEditebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='Reviewdeletebtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo('#Review_table');
                });



    $('.Reviewdeletebtn').click(function() {
        var id = $(this).data('id');
        $('#ReviewDeleteID').html(id);
        $('#Reviewdeletemodal').modal('show');

    })

    $('.ReviewEditebtn').click(function() {
        var id = $(this).data('id');
        $('#ReviewEditID').html(id);
        getReviewdetails(id);
        $('#UpdateReviewModal').modal('show');

    })
       $('#ReviewTableID').DataTable({"order":false});
        $('.dataTables_length').addClass('bs-select');

   } 
            else {
                $('#loaderdivReview').addClass('d-none');
                $('#wrongdivReview').removeClass('d-none');
            }

           
        }).catch(function(error) {
    
        });
    }

    $('#AddNewReviewBtnID').click(function(){

        $('#addReviewModal').modal('show');

    });


    $('#ReviewAddConfirmBtn').click(function(){

      var ReviewName=  $('#ReviewNameId').val();
      var ReviewDes=  $('#ReviewDesId').val();
      var ReviewImg=  $('#ReviewImgId').val();
      
      ReviewAdd(ReviewName,ReviewDes,ReviewImg);
    });


    function ReviewAdd(ReviewName,ReviewDes,ReviewImg) {

        if(ReviewName.length==0){
            toastr.error('Name Is Empty');
        }
        
        else if(ReviewDes.length==0){
            toastr.error('Description Is Empty');
        
        }

        else if(ReviewImg.length==0){
            toastr.error('Image Is Empty');
        
        }
        
        else{
            axios.post('/reviewadd', {
                name:ReviewName,
                des:ReviewDes,
                img:ReviewImg
            })
            .then(function(response) {
                if (response.status == 200){
                    if (response.data == 1) {
                        $('#addReviewModal').modal('hide');
                        toastr.success('Review Added Successfully');
                        getReviewdata();
                    } else {
                        $('#addReviewModal').modal('hide');
                        toastr.error('Failed');
                        getReviewdata();
                    }
                }
        
                else{
                    $('#addReviewModal').modal('hide');
                        toastr.error('Failed');
                  
                }
              
            })
            .catch(function(error) {
                $('#addReviewModal').modal('hide');
                toastr.error('Failed');
        });
        }
        }


        
    $('#Reviewdeleteconfirm').click(function() {
        var id = $('#ReviewDeleteID').html();
        getReviewdelete(id);
        })

        function getReviewdelete(deleteID) {
            axios.post('/reviewdelete', {
                    id: deleteID
                })
                .then(function(response) {
                    if (response.data == 1) {
                        $('#Reviewdeletemodal').modal('hide');
                        toastr.success('Delete Success');
                        getReviewdata();
                    } else {
                        $('#Reviewdeletemodal').modal('hide');
                        toastr.error('Delete Failed');
                        getReviewdata();
                    }
                })
                .catch(function(error) {
            
                });
            
            }


    
    function getReviewdetails(detailsID) {
        axios.post('/reviewdetails', {
                id: detailsID  
            })
            .then(function(response) {
                if (response.status == 200){
                    $('#ReviewEditForm').removeClass('d-none');
                    $('#ReviewEditLoader').addClass('d-none');
                   
        
                 var dataJSON = response.data;
                    $('#ReviewNameupdateId').val(dataJSON[0].name);
                    $('#ReviewDesupdateId').val(dataJSON[0].des);
                    $('#ReviewImgupdateId').val(dataJSON[0].img);
                }
        
                else{
                    $('#ReviewEditLoader').addClass('d-none');
                    $('#ReviewEditWrong').removeClass('d-none');
                }
              
            })
            .catch(function(error) {
                $('#ReviewEditLoader').addClass('d-none');
                $('#ReviewEditWrong').removeClass('d-none');
        });
        
        }

        $('#ReviewEditConfirmBtn').click(function() {
            var ReviewID = $('#ReviewEditID').html();
            var ReviewName=  $('#ReviewNameupdateId').val();
            var ReviewDes=  $('#ReviewDesupdateId').val();
            var ReviewImg=  $('#ReviewImgupdateId').val();
            ReviewUpdate(ReviewID,ReviewName,ReviewDes,ReviewImg)
            })


            function ReviewUpdate(ReviewID,ReviewName,ReviewDes,ReviewImg) {

                if(ReviewName.length==0){
                    toastr.error('Name Is Empty');
                }
                
                else if(ReviewDes.length==0){
                    toastr.error('Description Is Empty');
                
                }
                
                else if(ReviewImg.length==0){
                    toastr.error('Image Is Empty');
                
                }
            
                
                else{
                axios.post('/reviewupdate', {
                    id:ReviewID,
                    name:ReviewName,
                    des:ReviewDes,
                    img:ReviewImg
                })
                .then(function(response) {
                    if (response.status == 200){
                        if (response.data == 1) {
                            $('#UpdateReviewModal').modal('hide');
                            toastr.success('Update Success');
                            getReviewdata();
                        } else {
                            $('#UpdateReviewModal').modal('hide');
                            toastr.error('Update Failed');
                            getReviewdata();
                        }
                    }
                
                    else{
                      
                    }
                  
                })
                .catch(function(error) {
                  
                });
                }
                }