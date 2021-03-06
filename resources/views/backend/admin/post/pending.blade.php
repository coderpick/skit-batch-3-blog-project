@extends('layouts.backend.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('admin.post.create') }}" class="btn btn-success btn-sm"><i
                                    class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                       role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th rowspan="1" colspan="1">S/N</th>
                                        <th rowspan="1" colspan="1">Title</th>
                                        <th rowspan="1" colspan="1">Author</th>
                                        <th rowspan="1" colspan="1">Is Approved</th>
                                        <th rowspan="1" colspan="1">Status</th>
                                        <th rowspan="1" colspan="1">Views</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($posts as $key => $post)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{!!  \Illuminate\Support\Str::limit($post->title,15)  !!}</td>
                                            <td>{{ $post->user->name??"" }}</td>
                                            <td>
                                                @if($post->is_approved == true)
                                                    <span class="badge bg-blue">Approved</span>
                                                @else
                                                    <span class="badge bg-pink">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($post->status == true)
                                                    <span class="badge bg-blue">Published</span>
                                                @else
                                                    <span class="badge bg-pink">Pending</span>
                                                @endif
                                            </td>
                                            <td>{{ $post->view_count }}</td>
                                            <td width="14%">
                                                <a href="{{ route('admin.post.show', $post->id) }}"
                                                class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">S/N</th>
                                        <th rowspan="1" colspan="1">Title</th>
                                        <th rowspan="1" colspan="1">Author</th>
                                        <th rowspan="1" colspan="1">Is Approved</th>
                                        <th rowspan="1" colspan="1">Status</th>
                                        <th rowspan="1" colspan="1">Views</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
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
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@push('csutomCSS')

@endpush
@push('js')
    <!-- DataTables -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sweetalert2.all.js') }}"></script>
@endpush
@push('customJS')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
