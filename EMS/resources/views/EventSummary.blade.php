@extends('layout.app')
@section('title','Events')
@section('content')
@include('Components.EventSummaryComponent')
@endsection


@section('script')
<script type = "text/javascript">
$('#SummaryTable').DataTable({"order":false});
$('.dataTables_length').addClass('bs-select');

</script>
@endsection
