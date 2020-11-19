@extends('layouts.backend.master')
@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">Add New</h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('admin.tag.index') }}" class="btn btn-warning btn-sm text-white"><i
                                    class="fa fa-reply"></i> Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form action="{{ route('admin.tag.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tag Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="text-danger ">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@push('css')


@endpush
@push('csutomCSS')

@endpush
@push('js')

@endpush
@push('customJS')

@endpush
