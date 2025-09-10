@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Settings</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Change Password</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.changePass', Auth::id()) }}" method="POST">
                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter new password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Change</button>

                </form>
            </div>
        </div>
    </div>
</div>
@stop


