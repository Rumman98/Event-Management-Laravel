@extends('layout.app')
@section('title','Events')
@section('content')

@include('Components.HostProfileComponent')
@endsection


@section('script')

<script type = "text/javascript">

getEventDetails();


//Host Password Change Start
$('#host_confirm_pass').click(function() {
    var host_mobile_no  = $('#host_phone_no').val();
    var host_oldPass    = $('#host_old_pass').val();
    var host_newPass    = $('#host_new_pass').val();
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
            $('#HostChngPasswordModal').modal('hide');
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
        flash('Shit happens 💩',{'bgColor' : '#f74134'});
    })
}
//Host Password Change Finish

//********************************************************************************

//Host Info Update Start
$('#hostEditBtnClick').click(function(){
    var user_id = $(this).data('id');
    HostDetails(user_id);
})

function HostDetails(user_id)
{
    var url = '/host-details';

    axios.post(url, {
        user_id: user_id
    }).then(function(response){
        if(response.status==200)
        {
            var JsonData = response.data;
            $('#host_id').val(JsonData[0].id);
            $('#HostNameUpdateId').val(JsonData[0].name);
            $('#HostEmailUpdateId').val(JsonData[0].email);
            $('#HostAddressUpdateId').val(JsonData[0].address);
            $('#HostPhoneUpdateId').val(JsonData[0].phone_number);
        }
    }).catch(function(error){
        flash('Shit happens 💩',{'bgColor' : '#cccc00'});
    })
}

$('#HostUpdateConfirm').click(function(){
    var hostId       = $('#host_id').val();
    var HostName     = $('#HostNameUpdateId').val();
    var HostEmail    = $('#HostEmailUpdateId').val();
    var HostAddress  = $('#HostAddressUpdateId').val();
    var HostPhone    = $('#HostPhoneUpdateId').val();

    HostDataUpdate(hostId, HostName, HostEmail, HostAddress, HostPhone);
})

function HostDataUpdate(hostId, HostName, HostEmail, HostAddress, HostPhone)
{
    let url = '/host-update';

    axios.post(url, {
        hostId: hostId,
        HostName: HostName,
        HostEmail: HostEmail,
        HostAddress: HostAddress,
        HostPhone: HostPhone
    }).then(function(response){
        if(response.status == 200 &&response.data == 1)
        {
            $('#HostProfileModal').modal('hide');
            flash('Details Updated',{'bgColor' : '#00b859'});
            window.location.href='/hostprofile';
        }
        else
        {
            flash('Update failed',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Shit happens 💩',{'bgColor' : '#cccc00'});
    })
}
//Host Info Edit Finish

//****************************************************************************

//Add Event Start
$('#saveEventBtnID').click(function(){
    var eventName        = $('#EventNameId').val();
    var eventDes         = $('#EventDesID').val();
    var eventType        = $('#EventTypeId').val();
    var eventPayMethod   = $('#PaymentMethodID').val();
    var eventPayAccNo    = $('#AccountNumberID').val();
    var eventTime        = $('#EventTimeId').val();
    var eventDate        = $('#EventDateId').val();
    var eventVenue       = $('#EventVenueId').val();
    var eventRegFee      = $('#EventRegAmountId').val();
    var eventRegLastDate = $('#EventRegLastDateId').val();

    addNewEvent(eventName, eventDes, eventType, eventPayMethod, eventPayAccNo, eventTime, eventDate, eventVenue, eventRegFee, eventRegLastDate);
})

function addNewEvent(eventName, eventDes, eventType, eventPayMethod, eventPayAccNo, eventTime, eventDate, eventVenue, eventRegFee, eventRegLastDate)
{
    let url = '/add-event';
    axios.post(url, {
        eventName:eventName,
        eventDes:eventDes,
        eventType:eventType,
        eventPayMethod:eventPayMethod,
        eventPayAccNo:eventPayAccNo,
        eventTime:eventTime,
        eventDate:eventDate,
        eventVenue:eventVenue,
        eventRegFee:eventRegFee,
        eventRegLastDate:eventRegLastDate
    }).then(function(response){
        if(response.status == 200 && response.data == 1)
        {
            $('#AddEventModal').modal('hide');
            flash('Event Successfully Submited for Review. ',{'bgColor' : '#00b859'});
            window.location.href='/hostprofile';
        }
        else
        {
            flash('Event Add failed',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Shit happens 💩',{'bgColor' : '#cccc00'});
    })
}
//Add Event End

//****************************************************************************

//Event Data Show Start
function getEventDetails()
{
    let url = '/get-event-data';
    axios.get(url).then(function(response){
        if(response.status == 200)
        {
            var jsonData = response.data;
            $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].event_name + "</td>" +
                        "<td>" + jsonData[i].event_type + "</td>" +
                        "<td>" + jsonData[i].event_time + "</td>" +
                        "<td>" + jsonData[i].event_venue + "</td>" +
                        "<td>" + jsonData[i].event_registration_fee + "</td>" +
                        "<td>" + jsonData[i].event_reg_last_date + "</td>" +
                        "<td>" + jsonData[i].event_approval + "</td>" +

                        "<td><a class='editEventBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit' style='color:antiquewhite;'></i></a><a class='deleteEventBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt' style='color:antiquewhite; padding:13px;'></i></a> <a href='{{'/event-summary'}}?event-id="+ jsonData[i].id +"&&name="+ jsonData[i].event_name +"' ><i class='fas fa-eye' style='color:antiquewhite;'></i></a></td>"

                    ).appendTo('#event_show');
                });

                $('.editEventBtn').click(function(){
                    var event_id = $(this).data('id');
                    eventDataShow(event_id);
                    $('#EditEventModal').modal('show');
                })

                $('.deleteEventBtn').click(function(){
                    var event_id = $(this).data('id');
                    $('#deleteEventID').html(event_id);
                    $('#DeleteEventModal').modal('show');
                })

                $('#EventShowTable').DataTable({"order":false});
                $('#RegisteredEventShowTableforHost').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');


        }
        else
        {

        }
    }).catch(function(error){
        flash('Shit happens 💩',{'bgColor' : '#cccc00'});
    })
}
//Event Data Show End

//****************************************************************************

//Event Data Edit Start

function eventDataShow(event_id)
{
    let url = '/event-details';
    axios.post(url, {
        eventId: event_id
    }).then(function(response){
        if(response.status == 200)
        {
            var JsonData = response.data;
            $('#event_id').val(JsonData[0].id);
            $('#EditEventNameId').val(JsonData[0].event_name);
            $('#EditEventDesID').val(JsonData[0].event_description);
            $('#EditEventTypeId').val(JsonData[0].event_type);
            $('#EditPaymentMethodID').val(JsonData[0].event_payment_method);
            $('#EditAccountNumberID').val(JsonData[0].event_pay_acc_no);
            $('#EditEventTimeId').val(JsonData[0].event_time);
            $('#EditEventDateId').val(JsonData[0].event_date);
            $('#EditEventVenueId').val(JsonData[0].event_venue);
            $('#EditEventRegAmountId').val(JsonData[0].event_registration_fee);
            $('#EditEventRegLastDateId').val(JsonData[0].event_reg_last_date);
        }
        else
        {
            flash('Something Went Wrong. Try Again Later',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Shit happens 💩',{'bgColor' : '#cccc00'});
    })
}

$('#confirmEditEventBtnID').click(function(){
    var event_id          = $('#event_id').val();
    var EventName         = $('#EditEventNameId').val();
    var EventDes          = $('#EditEventDesID').val();
    var EventType         = $('#EditEventTypeId').val();
    var EventPayMethod    = $('#EditPaymentMethodID').val();
    var EventPayAccNo     = $('#EditAccountNumberID').val();
    var EventTime         = $('#EditEventTimeId').val();
    var EventDate         = $('#EditEventDateId').val();
    var EventVenue        = $('#EditEventVenueId').val();
    var EventRegAmount    = $('#EditEventRegAmountId').val();
    var EventRegLastDate  = $('#EditEventRegLastDateId').val();

    editEventDetails(event_id, EventName, EventDes, EventType, EventPayMethod, EventPayAccNo, EventTime, EventDate, EventVenue, EventRegAmount, EventRegLastDate);
})

function editEventDetails(event_id, EventName, EventDes, EventType, EventPayMethod, EventPayAccNo, EventTime, EventDate, EventVenue, EventRegAmount, EventRegLastDate)
{
    let url = '/event-update';

    axios.post(url, {
        event_id         : event_id,
        EventName        :EventName,
        EventDes         :EventDes,
        EventType        :EventType,
        EventPayMethod   :EventPayMethod,
        EventPayAccNo    :EventPayAccNo,
        EventTime        :EventTime,
        EventDate        :EventDate,
        EventVenue       :EventVenue,
        EventRegAmount   :EventRegAmount,
        EventRegLastDate :EventRegLastDate
    }).then(function(response){
        if(response.status == 200 && response.data == 1)
        {
            flash('Event Successfully Updated. ',{'bgColor' : '#00b859'});
            window.location.href='/hostprofile';
        }
        else
        {
            flash('Something Went Wrong. Try Again Later',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Shit happens 💩',{'bgColor' : '#cccc00'});
    })
}

//Event Data Edit End

//****************************************************************************

//Event Delete Start

$('#DeleteEventBtnID').click(function(){
    var event_id = $('#deleteEventID').html();
    eventDelete(event_id);
})

function eventDelete(event_id)
{
    let url = '/event-delete';

    axios.post(url, {
        event_id: event_id
    }).then(function(response){
        if(response.status == 200 && response.data == 1)
        {
            flash('Event Successfully Deleted. ',{'bgColor' : '#00b859'});
            window.location.href='/hostprofile';
        }
        else
        {
            flash('Something Went Wrong. Try Again Later',{'bgColor' : '#f74134'});
        }
    }).catch(function(error){
        flash('Shit happens 💩',{'bgColor' : '#cccc00'});
    })
}

//Host Profile Photo Upload
$('#SaveProfilePhoto').on('click', function(){
    var profile_photo = $('#imgInput').prop('files')[0];
    var formData = new FormData();

    formData.append('photo', profile_photo);

    axios.post("/photoUploadHost", formData).then(function(response){
        if(response.status == 200)
        {
            $('#HostProfilePictureModal').modal("hide");
            flash('Photo Uploaded',{'bgColor' : '#00b859'});
            window.location.href='/hostprofile';
        }
        else
        {
            alert('Issue');
        }
    }).catch(function(error){

    })
})


</script>
@endsection
