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
                var mobile_number = response.data;
                window.location.href="/userprofile";
                flash('Login Successfull',{'bgColor' : '#00b859'});
            }
            else if(response.status == 200 && response.data == 2)
            {
                var mobile_number = response.data;
                window.location.href="/hostprofile";
                flash('Login Successfull ✔️',{'bgColor' : '#00b859'});
            }
            else
            {
                flash('Wrong Login Cardinals 🔒',{'bgColor' : '#f74134'});
            }
        }).catch(function(error){
            flash('Shit happens 💩',{'bgColor' : '#cccc00'});
        })
    })



</script>
@endsection
