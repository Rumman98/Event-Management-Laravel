@extends('layout.app')
@section('title','Events')
@section('content')

@include('Components.UserProfileComponent')

@endsection

@section('script')
<script type = "text/javascript">

//User Password Reset Start
$('#confirm_change').click(function() {
    var mobile_no = $('#phone_no').val();
    var oldPass = $('#old_pass').val();
    var newPass = $('#new_pass').val();
    var ConNewPass = $('#conNewPass').val();

    ChangePassword(mobile_no, oldPass, newPass, ConNewPass);
})

function ChangePassword(mobile_no, oldPass, newPass, ConNewPass)
{
    var url = '/changePassword';

    axios.post(url, {
        mobile_no: mobile_no,
        oldPass: oldPass,
        newPass: newPass,
        ConNewPass: ConNewPass

    }).then(function(response){
        if(response.status == 200 && response.data == 1)
        {
            $('#UserChngPasswordModal').modal('hide');
            flash('Password Change Successfull',{'bgColor' : '#00b859'});
            $('#UserChngPasswordModal').modal('hide');

        }
        else if(response.status == 200 && response.data == 2)
        {
            flash('Current Password Not Matching. Try Again',{'bgColor' : '#f74134'});
        }
        else if(response.status == 200 && response.data == 3)
        {
            flash('Check Confirm Password.',{'bgColor' : '#f74134'});
        }
        else
        {
            flash('Change Failed',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Shit happens 💩',{'bgColor' : '#cccc00'});
    })
}
//User Password Reset Close

//***************************************************************************************

//User Info Update Start
$('#userEditBtnClick').click(function(){
    var id = $(this).data('id');
    userDetails(id);
})

function userDetails(id)
{
    let url = '/user-details';

    axios.post(url, {
        user_id: id

    }).then(function(response){
        if(response.status == 200)
        {
            var JsonData = response.data;
            $('#user_id').val(JsonData[0].id);
            $('#ProfileNameUpdateId').val(JsonData[0].name);
            $('#ProfileEmailUpdateId').val(JsonData[0].email);
            $('#ProfileAddressUpdateId').val(JsonData[0].address);
            $('#ProfilePhoneUpdateId').val(JsonData[0].phone_number);
        }
    }).catch(function(error){

    })
}

$('#UpdateConfirmBtn').click(function(){
   var user_id = $('#user_id').val();
   var NameUpdateId = $('#ProfileNameUpdateId').val();
   var EmailUpdateId = $('#ProfileEmailUpdateId').val();
   var AddressUpdateId = $('#ProfileAddressUpdateId').val();

   UserDataUpdate(user_id, NameUpdateId, EmailUpdateId, AddressUpdateId);
})

function UserDataUpdate(user_id, NameUpdateId, EmailUpdateId, AddressUpdateId)
{
    var url = '/user-update';
    axios.post(url, {
        user_id:user_id,
        Name:NameUpdateId,
        Email:EmailUpdateId,
        Address:AddressUpdateId
    }).then(function(response){
        if(response.status == 200 && response.data == 1)
        {
            $('#UserProfileModal').modal("hide");
            flash('Details Updated',{'bgColor' : '#00b859'});
            window.location.href='/userprofile';
        }
        else
        {
            flash('Update Failed',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Shit happens 💩',{'bgColor' : '#cccc00'});
    })
}


//User Profile Photo Upload
$('#SaveProfilePhoto').on('click', function(){
    var profile_photo = $('#imgInput').prop('files')[0];
    var formData = new FormData();

    formData.append('photo', profile_photo);

    axios.post("/photoUpload", formData).then(function(response){
        if(response.status == 200)
        {
            $('#UserProfilePictureModal').modal("hide");
            flash('Photo Uploaded',{'bgColor' : '#00b859'});
            window.location.href='/userprofile';
        }
        else
        {
            alert('Issue');
        }
    }).catch(function(error){

    })
})


// User Info Update End
$('#RegisteredEventShowTable').DataTable({"order":false});
$('.dataTables_length').addClass('bs-select');

</script>
@endsection
