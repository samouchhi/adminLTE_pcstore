@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Update Users</h1>
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
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="text">Username</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter new password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm new password">
                        </div>
                        <div class="form-group">
                            <label for="text">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>active</option>
                                <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>inactive
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary ">Update User</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
