<header id="header" >
<div class="header-content clearfix" > <span class="logo"><a href="/">Unity<b>Events</b></a></span>
<nav class="navigation" role="navigation">
    <ul class="primary-nav">
      <li><a href="{{'/'}}">Home</a></li>
      <li><a href="{{'/running-events'}}">Running Events</a></li>
      <li><a href="{{'/gallery'}}">Gallery</a></li>

@php
use App\UserHostModel;
$phoneNumber=Session::get('phone_number');
$usernumber=UserHostModel::where('phone_number','=', $phoneNumber)->where('user_type', '=', 0)->count();
$hostnumber=UserHostModel::where('phone_number','=', $phoneNumber)->where('user_type', '=', 1)->count();
if ($usernumber==1)
{
    @endphp
    <li><a href="{{'/userprofile'}}">Profile</a></li>
    @php
}

else if ($hostnumber==1) {
    @endphp
    <li><a href="{{'/hostprofile'}}">Profile</a></li>
    @php
}

else {
    @endphp
    <li><a href="{{'/login'}}">Login/Signup</a></li>
    @php
}
@endphp


      <li><a href="{{'/contact-us'}}">Contact Us</a></li>
    </ul>
  </nav>

  <a href="#" class="nav-toggle">Menu<span></span></a> </div>
</header>
