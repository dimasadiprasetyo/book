<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="background-color: #1e81b0;">
        {{-- <img src="dist/img/book.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        {{-- &nbsp;<i class="nav-icon fas fa-book" alt="icon" style="opacity: .8"></i> --}}
        <span class="brand-text font-weight-light"> Logbook</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/avatar/avatar-1.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                <div class="info">
                    <a href="#" class="d-block">Main Navigation</a>
                </div>
            </div>
        </nav>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            DASBOARD
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                </li><!--Dasboard-->

                <li class="nav-item">
                    <a href="{{route('master.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                           APLIKASI
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                </li><!--Master-->
                <li class="nav-item">
                    <a href="{{route('trk.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            TRANSAKSI
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                </li><!--Transaksi-->
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            USER
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                </li><!--User-->



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>