@extends('adminlte::page')

@section('title', 'Profile')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@section('content')

    {{-- Flash success -> SweetAlert --}}
    @if (session('success'))
        <script>
            Swal.fire({
                title: @json(session('success')),
                icon: "success",
                draggable: false
            });
        </script>
    @endif
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blogs</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('blogs.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> Add Blog
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Make the table take the full width and align left -->
                <div class="col-12 p-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="productTable" class="table table-bordered table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Author</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $num = 1;
                                        @endphp
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->description }}</td>
                                                <td>{{ $blog->created_at }}</td>
                                                <td>{{ $blog->staff_name }}</td>
                                                <td>
                                                    @if ($blog->image)
                                                        <img src="{{ asset('storage/uploads/' . $blog->image) }}"
                                                            alt="{{ $blog->title }}" class="img-thumbnail"
                                                            style="max-width: 100px;">
                                                    @endif
                                                </td>
                                                <td class="text-nowrap">
                                                    <a href="{{ route('blogs.edit', $blog->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('blogs.destroy', $blog->id) }}"
                                                        method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- More rows go here -->
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@section('js')
@include('admin.partials.delete-confirmation')
@stop
@stop
