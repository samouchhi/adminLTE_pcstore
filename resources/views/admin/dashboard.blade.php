@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <div class="small-box bg-gradient-success">
            <div class="inner">
                <h3>{{ $activeUsers }}</h3>
                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="{{ route('users.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <div class="small-box bg-gradient-info">
            <div class="inner">
                <h3>{{ $activeAdmins }}</h3>
                <p>Total Admins</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="{{ route('admins.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@stop
