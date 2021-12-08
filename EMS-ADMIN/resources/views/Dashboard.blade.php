@extends('layout.app')
@section('title','Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-2">
            <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$TotalVisitor}}</h3>

                  <p>Total Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <i class="fas fa-chart-line"></i>
                </a>
              </div>
        </div>


        <div class="col-md-3 p-2">
            <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$TotalUsers}}</h3>

                  <p>Total User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <i class="fas fa-users"></i>
                </a>
              </div>
        </div>


        <div class="col-md-3 p-2">
            <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$TotalHosts}}</h3>

                  <p>Total Host</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <i class="fas fa-smile-wink"></i>
                </a>
              </div>
        </div>


        <div class="col-md-3 p-2">
            <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$TotalEvents}}</h3>

                  <p>Total Running Events</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <i class="fas fa-list-alt"></i>
                </a>
              </div>
        </div>



    </div>


    <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-bar-chart-o"></i>
          <h3 class="box-title">Traffic</h3>
        </div>
        <div class="box-body">
          <canvas id="myChart" style="display: block;box-sizing: border-box;height: 474px;width: 949px;"></canvas>
        </div>
        <!-- /.box-body-->
      </div>

</div>

@endsection

@section('script')
<script>
var xValues = [100,200,300,400,500,600,700,800,900,1000];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: [1600,1700,1700,1900,2000,2700,300],
      borderColor: "#5a5a5a",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});

</script>

@endsection

