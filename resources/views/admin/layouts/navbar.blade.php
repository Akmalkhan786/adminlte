<header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin.home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/uploads/user/{{Auth::user()->image}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="/uploads/user/{{Auth::user()->image}}" class="img-circle" alt="User Image">

                            <p>
                                {{Auth::user()->name}} - Web Developer
                                <small>Member since {{Auth::user()->created_at->toFormattedDateString()}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('logout')}}" onclick="
                                                            event.preventDefault();
                                                            document.getElementById('logout-form').submit();
                                                                " class="btn btn-default btn-flat">Signout</a>
                                <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>