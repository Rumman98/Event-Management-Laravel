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
            if(response.status == 200 && response.data == 1)
            {
                window.location.href="/profile";
                flash('Login Successfully',{'bgColor' : '#00b859'});
            }

            else
            {
                flash('Login Error',{'bgColor' : '#f74134'});

            }
        }).catch(function(error){
            console.log("Catch");
        })
    })



</script>
@endsection
