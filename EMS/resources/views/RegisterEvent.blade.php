@extends('layout.app')
@section('title','Login')
@section('content')
@include('Components.RegisterEventComponent')
@endsection

@section('script')
<script type = "text/javascript">

    // Get the variable
var eventData = localStorage['eventObject'];
localStorage.removeItem( 'eventObject' ); // Clear the localStorage
var event_name = JSON.parse(eventData).event_name;
var event_des = JSON.parse(eventData).event_des;
var event_type = JSON.parse(eventData).event_type;
var event_date = JSON.parse(eventData).event_date;
var event_time = JSON.parse(eventData).event_time;
var event_venue = JSON.parse(eventData).event_venue;
var event_fee = JSON.parse(eventData).event_fee;

$('#event_name').html(event_name);
$('#event_des').html(event_des);
$('#event_type').html(event_type);
$('#event_date').html(event_date);
$('#event_time').html(event_time);
$('#event_venue').html(event_venue);
$('#event_fee').html(event_fee);

</script>
@endsection
