@extends('layout.app')
@section('title','Events')
@section('content')
@include('Components.eventsBanner')

@include('Components.AllEvent')
@endsection

@section('script')
<script type = "text/javascript">

   $('.ViewEventDetailsClass').click(function(){

      var eventDetailsid = $(this).data('id');
      ViewEventDetails(eventDetailsid);
      $('#ShowEventDetailsModal').modal('show');

   })

   $('#RegisterEventID').click(function(){

      var event_name = $('#event_name').val();
      alert(event_name);
   })

   function ViewEventDetails(eventDetailsid)
   {
      let url = '/event-details-modal';

      axios.post(url, {
         eventDetailsid: eventDetailsid
      }).then(function(response){
         if(response.status == 200)
         {
            var JsonData = response.data;
            $('#event_name').html(JsonData[0].event_name);
            $('#event_des').html(JsonData[0].event_description);
            $('#event_type').html(JsonData[0].event_type);
            $('#event_time').html(JsonData[0].event_time);
            $('#event_date').html(JsonData[0].event_date);
            $('#event_venue').html(JsonData[0].event_venue);
            $('#event_fee').html(JsonData[0].event_registration_fee);
         }
         else
         {
            flash('Something Went Wrong. Try Again Later',{'bgColor' : '#f74134'});
         }
      }).catch(function(error){

      })
   }
</script>   
@endsection
