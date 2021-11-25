@extends('layout.app')
@section('title','Events')
@section('content')

@include('Components.UserProfileComponent')

@endsection

@section('script')
<script type = "text/javascript">

//User Password Reset
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
            flash('Change failed',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Catch',{'bgColor' : '#f74134'});
    })
}
</script>
@endsection
