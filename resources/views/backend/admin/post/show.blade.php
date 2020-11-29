@extends('layouts.backend.master')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {{-- <img src="{{ asset($post->image) }}" alt="">
                    --}}
                    <img src="{{ Storage::disk('public')->url('post/' . $post->image) }}" alt="">
                    <h2>{{ $post->title }}</h2>
                    <p>
                        <small>Posted By <strong> <a href="">{{ $post->user->name ?? '' }}</a></strong> on
                            {{ $post->created_at->toFormattedDateString() }}</small>
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
                    @if ($post->tags != null)
                        @foreach ($post->tags as $tag)
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
                    @if ($post->categories != null)
                        @foreach ($post->categories as $category)
                            <span class="badge badge-info">{{ $category->name }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            @if ($post->is_approved == false)
                <button type="button" class="btn btn-success waves-effect"
                    onclick="approvePost({{ $post->id }})">
                    <span>Approve</span>
                </button>
                <form method="post" action="{{ route('admin.post.approve', $post->id) }}" id="approval-form"
                    style="display: none">
                    @csrf
                    @method('PUT')
                </form>
            @else
                <button type="button" class="btn btn-success" disabled>                    
                    <span>Approved</span>
                </button>
            @endif
        </div>
    </div>
@endsection
@push('js') 
    <script src="{{ asset('assets/backend/js/sweetalert2.all.js') }}"></script>
@endpush
@push('customJS')
<script>
     // sweet alert active
    function approvePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this post ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The post remain pending :)',
                        'info'
                    )
                }
            })
        }
</script>

@endpush