@extends('layout.app')
@section('title','Login')
@section('content')
@include('Components.RegisterEventComponent')
@endsection

@section('script')
<script type = "text/javascript">

var eventData = localStorage['eventObject'];


var event_id = JSON.parse(eventData).event_id;
var event_name = JSON.parse(eventData).event_name;
var event_des = JSON.parse(eventData).event_des;
var event_type = JSON.parse(eventData).event_type;
var event_payment_method = JSON.parse(eventData).event_payment_method;
//var event_pay_acc_no = JSON.parse(eventData).event_pay_acc_no;
var event_date = JSON.parse(eventData).event_date;
var event_time = JSON.parse(eventData).event_time;
var event_venue = JSON.parse(eventData).event_venue;
var event_fee = JSON.parse(eventData).event_fee;

$('#event_id').val(event_id);
$('#event_name').html(event_name);
$('#event_des').html(event_des);
$('#event_type').html(event_type);
$('#event_payment_method').val(event_payment_method);
//$('#event_type').html(event_pay_acc_no);
$('#event_date').html(event_date);
$('#event_time').html(event_time);
$('#event_venue').html(event_venue);
$('#event_fee').html(event_fee);


$('#confirmPaymentBtnID').click(function(){
    var user_name = $('#user_name').html();
    var user_phone_no = $('#user_phone_no').html();
    var event_name = $('#event_name').html();
    var event_type =$('#event_type').html();
    var event_date = $('#event_date').html();
    var event_id = $('#event_id').val();
    var user_acc_no = $('#UserAccountNumberId').val();
    var transaction_no = $('#UserTransactionId').val();

    RegistrationOnEvent(user_name, user_phone_no, event_name, event_type, event_date, event_id, user_acc_no, transaction_no);
})

function RegistrationOnEvent(user_name, user_phone_no, event_name, event_type, event_date, event_id, user_acc_no, transaction_no)
{
    let url = '/register-event-by-user';

    axios.post(url, {
        user_name:user_name,
        user_phone_no:user_phone_no,
        event_name:event_name,
        event_type:event_type,
        event_date:event_date,
        event_id:event_id,
        user_acc_no:user_acc_no,
        transaction_no:transaction_no
    }).then(function(response){
        if(response.status == 200 && response.data == 1)
        {
            flash('Submited for Approval. ',{'bgColor' : '#00b859'});
            localStorage.removeItem( 'eventObject' );
            //window.location.href='/hostprofile';
        }
        else if(response.status == 200 && response.data == 2)
        {
            flash('Oh, snap, This Transition Number Already Used 😱',{'bgColor' : '#f74134'});
        }
        else if(response.status == 200 && response.data == 3)
        {
            flash('Damn Man, You are the Host of this Event 🤬',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Shit Happens 💩',{'bgColor' : '#cccc00'});
    })
}

</script>
@endsection
