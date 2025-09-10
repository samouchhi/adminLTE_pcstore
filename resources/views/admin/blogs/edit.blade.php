@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Update Blog</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">

            <div class="card-body">
                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="text">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $blog->title }}" placeholder="Enter title" required>

                    </div>
                    <div class="form-group">
                        <label for="email">Description</label>
                        <textarea rows="10" name="description" class="form-control" placeholder="Enter description" required>{{ $blog->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label><br>
                        <input type="file" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary ">Update Blog</button>

                </form>
            </div>
        </div>
    </div>
</div>
@stop


