@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Update Admin</h1>
@stop

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="mt-2 alert alert-danger col-md-6">
                {{ $error }}
            </div>
        @endforeach
    @endif

<div class="row">
    <div class="col-md-6">
        <div class="card">

            <div class="card-body">
                <form action="{{ route('admins.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="text">Username</label>
                        <input type="text" name="name" class="form-control" value="{{ $admin->name }}" placeholder="Enter username" required>

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $admin->email }}" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter new password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                    </div>
                    <div class="form-group">
                        <label >Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active" {{ $admin->status === 'active' ? 'selected' : '' }}>active</option>
                                <option value="inactive" {{ $admin->status === 'inactive' ? 'selected' : '' }}>inactive</option>
                            </select>
                        </option>
                    </div>
                    <button type="submit" class="btn btn-primary ">Update Admin</button>

                </form>
            </div>
        </div>
    </div>
</div>
@stop


