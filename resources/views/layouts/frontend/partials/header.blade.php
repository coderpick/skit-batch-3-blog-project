   <header>
        <!-- Navbar  -->
        <div class="topbar d-none d-sm-block">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="topbar-left">
                            <div class="topbar-text">
                                @php
                                echo date('l, F d, Y');
                                @endphp
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="list-unstyled topbar-right">
                            <ul class="topbar-link">
                                <li><a href="{{ route('login') }}" title="">Login</a></li>
{{--                                <li><a href="{{ route('register') }}" title="">Register</a></li>--}}
                            </ul>
                            <ul class="topbar-sosmed">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- logo -->
        <div class="bg-white ">
            <div class="container">
                <div class="row">
                    <div class=" col-sm-12 col-md-4 my-auto d-none d-sm-block ">
                        <figure class="mb-0">
                            <a href="{{ route('home')  }}">
                                <img src="{{ asset('assets/frontend/images/placeholder/logo.jpg') }}" alt="" class="img-fluid logo">
                            </a>
                        </figure>
                    </div>
                    <div class="col-md-8 d-none d-sm-block ">
                        <figure class="mt-3 ">
                            <a href="#">
                                <img src="{{ asset('assets/frontend/images/placeholder/950x150.jpg')}}" alt="" class="img-fluid">
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- end logo -->

        <!-- navbar -->
        <div class="navigation-wrap navigation-shadow bg-white">
            <nav class="navbar navbar-hover navbar-expand-lg navbar-soft  ">
                <div class="container">
                    <div class="offcanvas-header">
                        <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                            <span class="navbar-toggler-icon"></span>
                        </div>
                    </div>
                    <figure class="mb-0 mx-auto d-block d-sm-none sticky-logo">
                        <a href="/homepage-v2.html">
                            <img src="images/placeholder/logo.jpg" alt="" class="img-fluid logo">
                        </a>
                    </figure>                  
                    <div class="collapse navbar-collapse justify-content-between" id="main_nav99">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link active " href="{{ route('home') }}"> নীড়পাতা </a>
                            </li>
                             <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle text-dark" href="#" data-toggle="dropdown"> বিভাগসমূহ
                            </a>
                            <ul class="dropdown-menu dropdown-menu-left">
                                @forelse($categories as $category)
                                <li><a class="dropdown-item text-dark" href=""> {{ $category->name }} </a>
                                </li>
                                @empty
                                    <li>No category found (:</li>
                                @endforelse
                            </ul>
                        </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('about') }}"> আমাদের সম্পর্কে </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}"> যোগাযোগ </a></li>
                        </ul>


                        <!-- Search bar.// -->
                        <ul class="navbar-nav ">
                            <li class="nav-item search hidden-xs hidden-sm "> <a class="nav-link" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Search content bar.// -->
                        <div class="top-search navigation-shadow">
                            <div class="container">
                                <div class="input-group ">
                                    <form action="#">
                                        <div class="row no-gutters mt-3">
                                            <div class="col">
                                                <input class="form-control border-secondary border-right-0 rounded-0"
                                                    type="search" value="" placeholder="Search">
                                            </div>
                                            <div class="col-auto">
                                                <a class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                                    href="/search-result.html">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Search content bar.// -->


                    </div> <!-- navbar-collapse.// -->
                </div>
            </nav>

        </div>

        <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-aside" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="widget__form-search-bar  ">
                            <div class="row no-gutters">
                                <div class="col">
                                    <input class="form-control border-secondary border-right-0 rounded-0" value=""
                                        placeholder="Search">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
            </div> <!-- modal-bialog .// -->
        </div> <!-- modal.// -->
        <!-- End Navbar  -->
    </header>
