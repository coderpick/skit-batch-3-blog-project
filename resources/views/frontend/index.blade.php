@extends('layouts.frontend.master')
@section('content')
    <!-- Tranding News -->
    <div class="bg-white">
        <!-- Trending News Start -->
        <div class="trending-news pt-4 border-tranding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="trending-news-inner">
                            <div class="title">
                                <i class="fa fa-bolt"></i>
                                <strong>নতুন খবর</strong>
                            </div>
                            <div class="trending-news-slider">
                                @forelse($posts as $post)
                                    <div class="item-single">
                                        <a href="javascript:void(0)">{{ $post->title }}</a>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending News End -->
    </div>
    <!-- End Tranding News -->
    <div class="col-md-8">
        <!-- Popular news carousel -->
        <div class="card__post-carousel">
            @forelse($posts as $post)
                <div class="item">
                    <!-- Post Article -->
                    <div class="card__post">
                        <div class="card__post__body">
                            <a href="">
                                <img src="{{ Storage::disk('public')->url('post/' . $post->image)}}" class="img-fluid" alt="">
                            </a>
                            <div class="card__post__content bg__post-cover">
                                <div class="card__post__category">
                                    @forelse( $post->categories as $category)
                                        {{ $category->name }}
                                    @empty
                                    @endforelse
                                </div>
                                <div class="card__post__title">
                                    <h2>
                                        <a href="#">
                                            {{$post->title}}
                                        </a>
                                    </h2>
                                </div>
                                <div class="card__post__author-info">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                by {{ $post->user->name??'' }}
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                               {{ $post->updated_at->toFormattedDateString()}}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            @empty
                <div class="item">
                    <p>No recent new found (:</p>
                </div>
            @endforelse
        </div>
        <!-- End Popular news carousel -->
        <!-- Banner ads -->
        <figure class="mt-4 mb-4">
            <a href="#">
                <img src="{{ asset('assets/frontend/images/placeholder/950x150.jpg') }}" alt="" class="img-fluid">
            </a>
        </figure>
        <!-- End Banner ads -->

        <!-- Popular news Category -->
        <div class="wrapper__list__article">
            <h4 class="border_section">জাতীয়</h4>
            <div class="row ">
                @forelse($nationals as $national)
                    @foreach($national->posts->slice(0, 2) as $post)
                        <div class="col-lg-6 pd-0">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="#">
                                        <img src="{{  Storage::disk('public')->url('post/'.$post ->image) }}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <div class="article__category">
                                        {{ $national->name }}
                                    </div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                                <span class="text-primary">
                                                    by {{ $post->user->name??"" }}
                                                </span>
                                        </li>
                                        <li class="list-inline-item">
                                                <span class="text-dark text-capitalize">
                                                      {{ $post->updated_at->toFormattedDateString()}}
                                                </span>
                                        </li>

                                    </ul>
                                    <h5>
                                        <a href="#">
                                            {{$post->title}}
                                        </a>
                                    </h5>
                                    <p>{!! \App\Traits\SlugHelper::str_limit($post->body, 400) !!}</p>
                                    <a href="#" class="btn btn-outline-primary mb-4 text-capitalize"> বিস্তারিত...</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @empty
                @endforelse
            </div>
            <div class="row">
                @forelse($nationals as $national)
                    @foreach ($national->posts->slice(0, 4) as $item)

                        <div class="col-md-6 mb-3">
                            <div class="card__post card__post-list">
                                <div class="image-sm">
                                    <a href="">
                                        <img src="{{  Storage::disk('public')->url('post/'.$item ->image) }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="card__post__body ">
                                    <div class="card__post__content">
                                        <div class="card__post__author-info mb-2">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        by {{ $item->user->name??"" }}
                                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">
                                                                          {{ $item->updated_at->toFormattedDateString()}}
                                                                    </span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="card__post__title">
                                            <h6>
                                                <a href="">
                                                    {{$item->title}}
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @empty
                @endforelse
            </div>
        </div>
        <!-- Popular news Category -->


        <!-- Popular 3 news carousel -->
        <div class="wrapper__list__article">
            <h4 class="border_section">বিনোদন</h4>
            <div class="row ">
                <div class="col-lg-12 pd-0">
                    <div class="article__entry-carousel-three">
                        @forelse($entertainments as $entertainment)
                            @foreach($entertainment->posts as $post)
                                <div class="item">
                                    <!-- Post Article -->
                                    <div class="article__entry">
                                        <div class="article__image">
                                            <a href="#">
                                                <img src="{{ Storage::disk('public')->url('post/'.$post ->image) }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="article__content">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            by {{ $post->user->name??"" }}
                                                        </span>
                                                </li>
                                                <li class="list-inline-item">
                                                        <span>
                                                             {{ $item->updated_at->toFormattedDateString()}}
                                                        </span>
                                                </li>

                                            </ul>
                                            <h5>
                                                <a href="#">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- End Popular 3 news carousel -->

        <!-- Category news -->
        <div class="wrapper__list__article">
            <h4 class="border_section">লাইফস্টাইল</h4>
            <div class="wrapp__list__article-responsive">
            @forelse($lifestyles as $lifestyle)
                @foreach($lifestyle->posts as $post)
                    <!-- Post Article List -->
                        <div class="card__post card__post-list card__post__transition mt-30">
                            <div class="row ">
                                <div class="col-md-5">
                                    <div class="card__post__transition">
                                        <a href="#">
                                            <img src="{{  Storage::disk('public')->url('post/'.$post ->image) }}" class="img-fluid w-100"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 my-auto pl-0">
                                    <div class="card__post__body ">
                                        <div class="card__post__content  ">
                                            <div class="card__post__category ">
                                                {{ $lifestyle->name }}
                                            </div>
                                            <div class="card__post__author-info mb-2">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                            <span class="text-primary">
                                                                by {{ $post->user->name??"" }}
                                                            </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                            <span class="text-dark text-capitalize">
                                                                                                                            {{ $item->updated_at->toFormattedDateString()}}
                                                                {{ $post->updated_at->toFormattedDateString()}}

                                                            </span>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="card__post__title">
                                                <h5>
                                                    <a href="#">
                                                        {{ $post->title }}
                                                    </a>
                                                </h5>
                                                <p class="d-none d-lg-block d-xl-block mb-0">
                                                    {!! \App\Traits\SlugHelper::str_limit($post->body, 400) !!}
                                                </p>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @empty
                @endforelse

            </div>
        </div>
    </div>
    @include('layouts.frontend.partials.sidebar')
@endsection
