@extends('layouts.backend.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('author.post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Add New Post</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="tag">Select Tag</label>
                                    <select name="tags[]" id="tag" class="form-control select2" multiple="multiple">
                                        @forelse($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @empty
                                            No tag found(:
                                        @endforelse
                                    </select>
                                    @error('tag')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select name="categories[]" id="category" class="form-control select2" multiple="multiple">
                                        @forelse($categories as $category)
                                            <option  value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                            No category found(:
                                        @endforelse
                                    </select>
                                    @error('category')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="Enter post title">
                                    @error('title')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="image">Post Image</label>
                                    <input type="file" name="image" id="image" data-height="200" class="form-control dropify">
                                    @error('image')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Post description</label>
                            <textarea name="description" id="description" class="form-control summernote">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                             <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" name="status" checked id="customCheckbox1" value="true">
                              <label for="customCheckbox1" class="custom-control-label">Published</label>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <a href="{{ route('author.post.index') }}" class="btn btn-warning btn-lg">Back to list</a>
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>

                </div>
        </div>

        </form>
    </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.css') }}">

@endpush
@push('csutomCSS')

@endpush
@push('js')
    <script src="{{ asset('assets/backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endpush
@push('customJS')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();
        });

        $(function () {
            // Summernote
            $('.summernote').summernote({
                focus: true,
                height: 300
            })
            //dropify js active
            $('.dropify').dropify();
        })
    </script>
@endpush
