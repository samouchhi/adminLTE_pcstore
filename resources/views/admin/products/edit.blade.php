@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Update Product</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="text">Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}"
                                placeholder="Enter product name" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Category</label><br>
                            @foreach ($categories as $category)
                                <label>
                                    <input type="checkbox" name="category_ids[]" value="{{ $category->id }}"
                                        {{ $product->categories->contains($category->id) ? 'checked' : '' }}>
                                    {{ $category->name }}
                                </label><br>
                            @endforeach


                        </div>
                        <div class="form-group">
                            <label for="text">Description</label>
                            <textarea name="description" class="form-control" rows="10">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="text">Price</label>
                            <input type="text" name="price" class="form-control" value="{{ $product->price }}"
                                placeholder="Enter price" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Stock</label>
                            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}"
                                placeholder="Enter stock" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Picture</label><br>
                            <input type="file" name="image" value="{{ $product->stock }}">
                        </div>



                        <button type="submit" class="btn btn-primary ">Update Product</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
