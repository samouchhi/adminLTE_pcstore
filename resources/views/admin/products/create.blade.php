@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Add Product</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="text">Product Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter product name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="text">Category</label><br>
                            @foreach ($categories as $category)
                                <label>
                                    <input type="checkbox" name="category_ids[]" value="{{ $category->id }}">
                                    {{ $category->name }}
                                </label><br>
                            @endforeach


                        </div>

                        <div class="form-group">
                            <label for="text">Description</label>
                            <textarea name="description" class="form-control" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="text">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Enter price" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Stock</label>
                            <input type="number" name="stock" class="form-control" placeholder="Enter stock" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Picture</label><br>
                            <input type="file" name="image" required>
                        </div>




                        <button type="submit" class="btn btn-primary ">Add Product</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
