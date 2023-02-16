<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #1e81b0;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: white;" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" style="color: white;" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('dist/img/avatar/avatar-1.png')}}" width="30px" height="30px" class="rounded-circle elevation-2 mr-1">
                <div class="d-sm-none d-lg-inline-block" style="color: white;">Hi, {{auth()->user()->name}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('editpas.user')}}" class="dropdown-item has-icon">
                    <i class="fas fa-lock"></i> Ubah Sandi
                </a>
                <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger" >
                    <i class="fas fa-sign-out-alt"></i> Logout
                    <div class="dropdown-divider"></div>
                </a>
            </div>
        </li>
    </ul>
</nav>
