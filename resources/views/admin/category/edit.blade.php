@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Update Category</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">

            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="text">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Enter category name" required>
                    </div>


                    <button type="submit" class="btn btn-primary ">Update Category</button>

                </form>
            </div>
        </div>
    </div>
</div>
@stop


