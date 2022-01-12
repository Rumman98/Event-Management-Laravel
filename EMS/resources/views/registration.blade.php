@extends('layout.app')
@section('title','Events')
@section('content')

@include('Components.registrationform')
@endsection

@section('script')
<script type = "text/javascript">
    $('#submitId').click(function(){
        var member_type = $("input[name=member_level]:checked").val();
        var name = $('#nameId').val();
        var email = $('#emailId').val();
        var mobileNo = $('#mobileNoId').val();
        var address = $('#addressId').val();
        var password =$('#passId').val();

        UserRegistration(member_type, name, email, mobileNo, address, password);
    })

    function UserRegistration(member_type, name, email, mobileNo, address, password)
    {
        var url = '/user-reg';
        axios.post(url, {
            member_type:member_type,
            name:name,
            email:email,
            mobileNo:mobileNo,
            address:address,
            password:password
        }).then(function(response){
            if(response.data == 1)
            {
                flash('Registration Completed Successfully',{'bgColor' : '#00b859'});
                window.location.href="/login";
            }
            else if(response.data == 2)
            {
            flash('Mobile Number or Email is Alerady Exist',{'bgColor' : '#f74134'});

            }
            else
            {
                iqwerty.toast.toast("Random Error 🤔");
            }
        }).catch(function(error){
            flash('Shit happens 💩',{'bgColor' : '#cccc00'});
        });
    }

</script>
@endsection
