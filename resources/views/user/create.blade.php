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
                <form action="{{ route('user.changePass', Auth::id()) }}" method="POST">
                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label for="text">Product Name</label>
                        <input type="text" name="productName" class="form-control" placeholder="Enter product name" required>
                    </div>
                    <div class="form-group">
                        <label for="text">Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter description" required>
                    </div>
                    <div class="form-group">
                        <label for="text">Stock</label>
                        <input type="text" name="stock" class="form-control" placeholder="Enter stock" required>
                    </div>



                    <button type="submit" class="btn btn-primary">Add Product</button>

                </form>
            </div>
        </div>
    </div>
</div>
@stop


