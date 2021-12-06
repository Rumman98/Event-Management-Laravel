<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0">
                    <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                 <li class="nav-item mt-3">ADMIN</li>
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item"><a href="{{url('/Logout')}}" class="normal-btn">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                    <li> <a href="{{url('/')}}" ><span> <i class="fas fa-columns"></i></span><span class="hide-menu">Dashboard</span></a></li>
                    <li> <a href="{{url('/visitor')}}" ><span> <i class="fas fa-chart-line"></i> </span><span class="hide-menu">Visitors</span></a></li>
                    <li> <a href="{{url('/Hosts')}}" ><span> <i class="fas fa-id-card-alt"></i></span><span class="hide-menu">Hosts</span></a></li>
                    <li> <a href="{{url('/Users')}}" ><span> <i class="fas fa-users"></i></span><span class="hide-menu">Users</span></a></li>
                    <li> <a href="{{url('/Events')}}" ><span> <i class="far fa-calendar-alt"></i></span><span class="hide-menu">Events</span></a></li>
                    <li> <a href="{{url('/Gallery')}}" ><span> <i class="fas fa-camera-retro"></i></span><span class="hide-menu">Gallery</span></a></li>
                    <li> <a href="{{url('/Messages')}}" ><span> <i class="fas fa-envelope-open-text"></i></span><span class="hide-menu">Messages</span></a></li>
                    <li> <a href="{{url('/Reports')}}" ><span> <i class="fas fa-bug"></i></span><span class="hide-menu">Report</span></a></li>
                    <li> <a href="{{url('/Clients-Review')}}" ><span> <i class="fas fa-comments"></i></span><span class="hide-menu">Clients Review</span></a></li>
                </ul>
            </nav>
        </div>
    </aside>
<div class="page-wrapper">
