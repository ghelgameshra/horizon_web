@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fs-3">Add Product</h1>
</div>

<div class="fs-4 mb-4">
    <a href="/dashboard/products/" class="badge bg-success"><i class="bi bi-arrow-left px-2 py-2"></i></a>
    <a href="" class="badge bg-warning"><i class="bi bi-pencil-square px-2 py-2"></i></a>

    <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')"><i class="bi bi-x-circle"></i></button>
    </form>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-2">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" readonly value="{{ $product->name }}" disabled>
        </div>
    
        <div class="mb-2">
            <label for="slug" class="form-label">Product Code</label>
            <input type="text" class="form-control" id="slug" name="slug" readonly value="{{ $product->slug }}" disabled>
        </div>
    
        <div class="mb-2">
            <label for="price" class="form-label">Product Code</label>
            <input type="text" class="form-control disable" id="price" name="price" readonly value="@currency($product['price'])" disabled>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-2">
            <label for="created_at" class="form-label">Created At</label>
            <input type="text" class="form-control" id="created_at" name="created_at" readonly value="{{ $product->created_at }}" disabled>
        </div>
        <div class="mb-2">
            <label for="updated_at" class="form-label">Updated At</label>
            <input type="text" class="form-control" id="updated_at" name="updated_at" readonly value="{{ $product->updated_at }}" disabled>
        </div>
        
        <div class="mb-2">
            <label for="category_id" class="form-label">Category</label>
            <input type="text" class="form-control" id="category_id" name="category_id" readonly value="{{ $product->category->name }}" disabled>
        </div>
    </div>
</div>
@endsection