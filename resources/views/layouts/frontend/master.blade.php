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
