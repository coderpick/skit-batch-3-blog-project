<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name??"" }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                {{-- Admin route start --}}
                @if (Request::is('admin*'))
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.tag.index') }}"
                            class="nav-link {{ Request::is('admin/tag*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Tag
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}"
                            class="nav-link {{ Request::is('admin/category*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Cateogry
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.post.index') }}"
                            class="nav-link {{ Request::is('admin/post*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Post
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.post.pending') }}"
                            class="nav-link {{ Request::is('admin/pending/post') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                            Pending Post
                            </p>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('admin.subscriber.list') }}"
                            class="nav-link {{ Request::is('admin/subscriber') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                            Subscriber
                            </p>
                        </a>
                    </li>

                @endif
                {{-- admin route end --}}

                {{-- Author route start --}}
                @if (Request::is('author*'))
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ route('author.dashboard') }}"
                            class="nav-link {{ Request::is('author/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('author.post.index') }}"
                            class="nav-link {{ Request::is('author/post*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Post
                            </p>
                        </a>
                    </li>
                @endif
                {{-- Author route end --}}


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
