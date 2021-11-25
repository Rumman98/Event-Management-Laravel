@extends('layout.app')
@section('title','Events')
@section('content')

@include('Components.HostProfileComponent')
@endsection


@section('script')

<script type = "text/javascript">

//Host Password Change
$('#host_confirm_pass').click(function() {
    var host_mobile_no = $('#host_phone_no').val();
    var host_oldPass = $('#host_old_pass').val();
    var host_newPass = $('#host_new_pass').val();
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
</script>

@endsection
