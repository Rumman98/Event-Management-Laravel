<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Invitation Card</title>
    <style>
        body{
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #ff5518;
           padding: 10px 40px;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .col-12{
            width: 100%;
            flex: 0 0 auto;
            text-align: center;
        }
        .text-white{
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        table{
            width: 100%;
            border-collapse: collapse;

        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }

        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
            text-align-last: start;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-white">Unity Events</h1>
                    <h1 class="text-white">Invitation Card</h1>
                </div>
            </div>
        </div>
        
        @foreach ($user_info as $user_info) 
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h3 class="sub-heading">Participant Name: <span>{{$user_info->name}}</span> </h3>
                    <h3 class="sub-heading">Phone Number: <span>{{$user_info->phone_number}}</span>  </h3>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($event_info as $event_info)
        <div class="body-section">
            <h3 class="heading">Event Information</h3>
            <br>
            <table>
                <tbody>
                    <tr>
                        <td style="font-weight: bolder;">Event Name :</td>
                        <td>{{$event_info->event_name}}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder;">Event Type :</td>
                        <td>{{$event_info->event_type}}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder;">Venue :</td>
                        <td>{{$event_info->event_venue}}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder;">Event Hosted By :</td>
                        <td>{{$event_info->name}}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder;">Host Contact :</td>
                        <td>{{$event_info->phone_number}}</td>
                    </tr>


                </tbody>
            </table>
            <br>
            <h3 class="heading">Status: {{$event_info->stutus}}</h3>
            <h3 class="heading">Payment Method: {{$event_info->event_payment_method}}</h3>
        </div>
        @endforeach

        <div class="body-section">
            <p>&copy; Copyright 2021 - UnityEvents.com All rights reserved.
            </p>
        </div>
    </div>

</body>
</html>
