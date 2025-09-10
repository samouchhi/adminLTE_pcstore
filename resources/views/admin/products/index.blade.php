@extends('adminlte::page')

@section('title', 'Profile')



@section('content')
    <!-- Content Wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: @json(session('success')),
                icon: "success",
                draggable: false
            });
        </script>
    @endif
    {{-- Flash success -> SweetAlert --}}

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('products.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Make the table take the full width and align left -->
                <div class="col-12 p-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="productTable" class="table table-bordered table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Categories</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Created At</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $num = 1;
                                        @endphp
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->categories->implode('name', ', ') }}</td>

                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td class="text-nowrap">
                                                    @if ($product->image)
                                                        <img src="{{ asset('storage/uploads/' . $product->image) }}"
                                                            alt="{{ $product->name }}" class="img-thumbnail"
                                                            style="max-width: 100px;">
                                                    @endif
                                                </td>
                                                <td class="text-nowrap">
                                                    <a href="{{ route('products.edit', $product->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('products.destroy', $product->id) }}"
                                                        method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- More rows go here -->
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@section('js')
    @include('admin.partials.delete-confirmation')
@stop
@stop
