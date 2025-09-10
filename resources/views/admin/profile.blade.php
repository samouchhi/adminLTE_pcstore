@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Information</h3>
            </div>
            <div class="card-body">
                @auth
                    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Role:</strong> {{ auth()->user()->role }}</p>
                @endauth
            </div>
        </div>
    </div>
</div>
@stop

