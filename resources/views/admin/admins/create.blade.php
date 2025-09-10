@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Add Admins</h1>
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
                <form action="{{ route('admins.store') }}" method="POST">

                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="text">Admin Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter admin name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Enter password" required>
                    </div>




                    <button type="submit" class="btn btn-primary ">Add Admin</button>

                </form>
            </div>
        </div>
    </div>
</div>
@stop


