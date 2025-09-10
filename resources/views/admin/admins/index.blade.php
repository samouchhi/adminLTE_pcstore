@extends('adminlte::page')

@section('title', 'Profile')



@section('content')
    <!-- Content Wrapper -->
    @if (session('success'))
        <div class="mt-2 alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admins</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('admins.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> Add Admin
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created at</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $num = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                            @if ($user->role === 'admin')
                                                <tr>
                                                    <td>{{ $num++ }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>{{ $user->status }}</td>
                                                    <td>
                                                        <a href="{{ route('admins.edit', $user->id) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('admins.destroy', $user->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
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
