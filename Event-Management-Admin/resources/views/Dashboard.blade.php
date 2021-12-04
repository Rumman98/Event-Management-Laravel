@extends('layout.app')
@section('title','Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-2">
            <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>

                  <p>Total Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
        </div>


        <div class="col-md-3 p-2">
            <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>

                  <p>Total User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
        </div>


        <div class="col-md-3 p-2">
            <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>

                  <p>Total Host</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
        </div>


        <div class="col-md-3 p-2">
            <div class="small-box bg-green">
                <div class="inner">
                  <h3>53</h3>

                  <p>Total Running Events</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
        </div>



    </div>


    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Line Chart</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body chart-responsive">
          <div class="chart" id="line-chart" style="height: 250px;"></div>
        </div>
        <!-- /.box-body -->
      </div>

</div>

@endsection

@section('script')
<script>
  $(function () {
    "use strict";
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666},
        {y: '2011 Q2', item1: 2778},
        {y: '2011 Q3', item1: 4912},
        {y: '2011 Q4', item1: 3767},
        {y: '2012 Q1', item1: 6810},
        {y: '2012 Q2', item1: 5670},
        {y: '2012 Q3', item1: 4820},
        {y: '2012 Q4', item1: 15073},
        {y: '2013 Q1', item1: 10687},
        {y: '2013 Q2', item1: 8432}
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
  });
</script>

@endsection

