@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Add Users</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="mt-2 alert alert-success col-md-6">
            {{ session('success') }}
        </div>
    @endif
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
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="text">Username</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter username" required>

                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
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
                        <button type="submit" class="btn btn-primary ">Add User</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
