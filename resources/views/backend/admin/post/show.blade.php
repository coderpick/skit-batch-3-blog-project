@extends('layouts.backend.master')
@section('content')
<div class="row">
    <div class="col-md-8">
        <img src="{{ asset($post->image) }}" alt="">
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->body !!}</p>

    </div>
</div>
@endsection
