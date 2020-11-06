    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ $pageTitle??"Page title" }}</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{  asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
    @stack('css')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{  asset('assets/backend/dist/css/adminlte.min.css') }}">
     <style>
     .main-header{
         z-index:99999 !important;
     }
     </style>
    @stack('customCSS')
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
