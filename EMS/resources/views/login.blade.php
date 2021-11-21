@extends('layout.app')
@section('title','Login')
@section('content')
@include('Components.loginform')
@endsection

@section('script')
<script type="text/javascript">

    $('#signin').on('submit',function(event){ //This is a freaking idiot Line
        event.preventDefault();

        let formData  = $(this).serializeArray();
        let mobile    = formData[0]['value'];
        let password  = formData[1]['value'];

        let url       = '/loginClick';

        axios.post(url,{
            mobile:mobile,
            password:password
        }).then(function(response){
            if(response.status == 200 && response.data >= 1)
            {
<<<<<<< Updated upstream
                var mobile_number = response.data;
                window.location.href="/profile/"+mobile_number; 
                flash('Login Successfull',{'bgColor' : '#00b859'});
=======
<<<<<<< HEAD
<<<<<<< HEAD
                window.location.href="/userprofile";
                flash('Login Successfully',{'bgColor' : '#00b859'});
=======
                var mobile_number = response.data;
                window.location.href="/profile/"+mobile_number; 
                flash('Login Successfull',{'bgColor' : '#00b859'});
>>>>>>> 410892fba3c768d5097f05c6002e7806d28dd8ef
=======
                var mobile_number = response.data;
                window.location.href="/profile/"+mobile_number; 
                flash('Login Successfull',{'bgColor' : '#00b859'});
>>>>>>> 410892fba3c768d5097f05c6002e7806d28dd8ef
>>>>>>> Stashed changes
            }

            else
            {
<<<<<<< Updated upstream
                flash('Wrong Login Cardinals',{'bgColor' : '#f74134'});
=======
<<<<<<< HEAD
<<<<<<< HEAD
                flash('Something went wrong',{'bgColor' : '#f74134'});
=======
                flash('Wrong Login Cardinals',{'bgColor' : '#f74134'});
>>>>>>> 410892fba3c768d5097f05c6002e7806d28dd8ef
=======
                flash('Wrong Login Cardinals',{'bgColor' : '#f74134'});
>>>>>>> 410892fba3c768d5097f05c6002e7806d28dd8ef
>>>>>>> Stashed changes

            }
        }).catch(function(error){
            console.log("Catch");
        })
    })



</script>
@endsection
