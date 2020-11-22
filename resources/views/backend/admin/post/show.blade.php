@extends('layouts.backend.master')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                {{-- <img src="{{ asset($post->image) }}" alt=""> --}}
                <img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="">
                <h2>{{ $post->title }}</h2>
                <p>
                 <small>Posted By <strong> <a href="">{{ $post->user->name??"" }}</a></strong> on {{ $post->created_at->toFormattedDateString() }}</small>
                </p>
                <p>{!! $post->body !!}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tags</h3>
            </div>
            <div class="card-body">
                @if($post->tags !=null)
                    @foreach($post->tags as $tag)
                        <span class="badge badge-info">{{ $tag->name }}</span>
                    @endforeach
                 @endif
            </div>
        </div>
         <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category</h3>
            </div>
            <div class="card-body">
                @if($post->categories !=null)
                    @foreach($post->categories as $category)
                        <span class="badge badge-info">{{ $category->name }}</span>
                    @endforeach
                 @endif
            </div>
        </div>
    </div>
</div>
@endsection
