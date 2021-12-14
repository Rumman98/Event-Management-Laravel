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

      var event_id = $('#event_id').val();
      var event_name = $('#event_name').html();
      var event_des = $('#event_des').html();
      var event_type = $('#event_type').html();
      var event_payment_method = $('#event_payment_method').html();
      var event_pay_acc_no = $('#event_pay_acc_no').html();
      var event_date = $('#event_date').html();
      var event_time = $('#event_time').html();
      var event_venue = $('#event_venue').html();
      var event_fee = $('#event_fee').html();

      var event_data = {'event_id':event_id, 'event_name':event_name, 'event_des':event_des, 'event_type':event_type, event_payment_method:event_payment_method, event_pay_acc_no:event_pay_acc_no, 'event_date':event_date, 'event_time':event_time, 'event_venue':event_venue, 'event_fee':event_fee};
      localStorage.setItem("eventObject", JSON.stringify(event_data));
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
            $('#event_id').val(JsonData[0].id);
            $('#event_name').html(JsonData[0].event_name);
            $('#event_des').html(JsonData[0].event_description);
            $('#event_type').html(JsonData[0].event_type);
            $('#event_payment_method').html(JsonData[0].event_payment_method);
            $('#event_pay_acc_no').html(JsonData[0].event_pay_acc_no);
            $('#event_time').html(JsonData[0].event_time);
            $('#event_date').html(JsonData[0].event_date);
            $('#event_venue').html(JsonData[0].event_venue);
            $('#event_fee').html(JsonData[0].event_registration_fee);
            $('#event_host_name').html(JsonData[0].name);
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
