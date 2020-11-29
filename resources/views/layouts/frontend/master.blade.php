<!DOCTYPE html>
<html lang="">

<head>
    @include('layouts.frontend.partials.head')
</head>

<body class="body-box bg-news-image">
<!-- loading -->
{{--<div class="loading-container">--}}
{{--    <div class="h-100 d-flex align-items-center justify-content-center">--}}
{{--        <ul class="list-unstyled">--}}
{{--            <li>--}}
{{--                <img src="images/placeholder/loading.png" alt="Alternate Text" height="100" />--}}
{{--            </li>--}}
{{--            <li>--}}

{{--                <div class="spinner">--}}
{{--                    <div class="rect1"></div>--}}
{{--                    <div class="rect2"></div>--}}
{{--                    <div class="rect3"></div>--}}
{{--                    <div class="rect4"></div>--}}
{{--                    <div class="rect5"></div>--}}

{{--                </div>--}}

{{--            </li>--}}
{{--            <li>--}}
{{--                <p>Loading</p>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- End loading -->

<!-- Header news -->
@include('layouts.frontend.partials.header')
<!-- End Header news -->

<!-- Popular Content news -->
<section class="bg-content">
    <div class="container">
        <div class="row">

          @yield('content')
            <!-- End Category news -->

            @include('layouts.frontend.partials.sidebar')

            <div class="mx-auto">
                <!-- Pagination -->
                <div class="pagination-area">
                    <div class="pagination wow fadeIn animated" data-wow-duration="2s" data-wow-delay="0.5s"
                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: fadeIn;">
                        <a href="#">
                            «
                        </a>
                        <a href="#">
                            1
                        </a>
                        <a class="active" href="#">
                            2
                        </a>
                        <a href="#">
                            3
                        </a>
                        <a href="#">
                            4
                        </a>
                        <a href="#">
                            5
                        </a>

                        <a href="#">
                            »
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<!-- End Popular Content news -->

{{-- footer --}}
@include('layouts.frontend.partials.footer')

<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
@include('layouts.frontend.partials.scripts')
</body>

</html>
