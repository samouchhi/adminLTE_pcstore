@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Add Blog</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">

            <div class="card-body">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="text">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter blog title" required>
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <textarea rows="10" name="description" class="form-control" placeholder="Enter blog description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Image</label><br>
                        <input type="file" name="image" required>
                    </div>




                    <button type="submit" class="btn btn-primary ">Add Blogs</button>

                </form>
            </div>
        </div>
    </div>
</div>
@stop


