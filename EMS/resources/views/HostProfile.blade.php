@extends('layout.app')
@section('title','Events')
@section('content')

@include('Components.HostProfileComponent')
@endsection


@section('script')

<script type = "text/javascript">

//Host Password Change Start
$('#host_confirm_pass').click(function() {
    var host_mobile_no  = $('#host_phone_no').val();
    var host_oldPass    = $('#host_old_pass').val();
    var host_newPass    = $('#host_new_pass').val();
    var host_ConNewPass = $('#host_conNewPass').val();

    HostChangePassword(host_mobile_no, host_oldPass, host_newPass, host_ConNewPass);
})

function HostChangePassword(host_mobile_no, host_oldPass, host_newPass, host_ConNewPass)
{
    var url = '/changePasswordHost';

    axios.post(url, {
        host_mobile_no: host_mobile_no,
        host_oldPass: host_oldPass,
        host_newPass: host_newPass,
        host_ConNewPass: host_ConNewPass

    }).then(function(response){
        if(response.status == 200 && response.data == 1)
        {
            flash('Password Change Successfull',{'bgColor' : '#00b859'});
            $('#HostChngPasswordModal').modal('hide');
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
            flash('Change failed',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Catch',{'bgColor' : '#f74134'});
    })
}
//Host Password Change Finish

//Host Info Update Start
$('#hostEditBtnClick').click(function(){
    var user_id = $(this).data('id');
    HostDetails(user_id);
})

function HostDetails(user_id)
{
    var url = '/host-details';

    axios.post(url, {
        user_id: user_id
    }).then(function(response){
        if(response.status==200)
        {
            var JsonData = response.data;
            $('#host_id').val(JsonData[0].id);
            $('#HostNameUpdateId').val(JsonData[0].name);
            $('#HostEmailUpdateId').val(JsonData[0].email);
            $('#HostAddressUpdateId').val(JsonData[0].address);
            $('#HostPhoneUpdateId').val(JsonData[0].phone_number);
        }
    }).catch(function(error){

    })
}

$('#HostUpdateConfirm').click(function(){
    var hostId       = $('#host_id').val();
    var HostName     = $('#HostNameUpdateId').val();
    var HostEmail    = $('#HostEmailUpdateId').val();
    var HostAddress  = $('#HostAddressUpdateId').val();
    var HostPhone    = $('#HostPhoneUpdateId').val();

    HostDataUpdate(hostId, HostName, HostEmail, HostAddress, HostPhone);
})

function HostDataUpdate(hostId, HostName, HostEmail, HostAddress, HostPhone)
{
    let url = '/host-update';

    axios.post(url, {
        hostId: hostId,
        HostName: HostName,
        HostEmail: HostEmail,
        HostAddress: HostAddress,
        HostPhone: HostPhone
    }).then(function(response){
        if(response.status == 200 &&response.data == 1)
        {
            flash('Details Updated',{'bgColor' : '#00b859'});
            window.location.href='/hostprofile';
        }
        else
        {
            flash('Update failed',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Catch',{'bgColor' : '#cccc00'});
    })
}
</script>
@endsection
