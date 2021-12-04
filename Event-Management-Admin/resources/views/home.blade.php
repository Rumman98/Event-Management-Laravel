@extends('layout.app')
@section('title','Home')

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

</div>

@endsection

