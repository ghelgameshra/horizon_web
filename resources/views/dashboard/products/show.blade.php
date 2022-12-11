@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fs-3">Add Product</h1>
</div>

<div class="col-lg-3">
    <form method="post" action="/dashboard/products">
        @csrf
        <div class="mb-2">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" autofocus value="{{ $product->name }}">
        </div>

        <div class="mb-2">
            <label for="slug" class="form-label">Product Code</label>
            <input type="text" class="form-control" id="slug" name="slug" readonly value="{{ $product->slug }}">
        </div>

        <div class="mb-2">
            <label for="price" class="form-label">Product Code</label>
            <input type="text" class="form-control" id="price" name="price" value="@currency($product['price'])">

        </div>
        <div class="mb-2">
            <label for="created_at" class="form-label">Created At</label>
            <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $product->created_at }}">
        </div>
        <div class="mb-2">
            <label for="updated_at" class="form-label">Updated At</label>
            <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $product->updated_at }}">
        </div>
        
        <div class="mb-2">
            <label for="category_id" class="form-label">Category</label>
            <input type="text" class="form-control" id="category_id" name="category_id" value="{{ $product->category->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Add product</button>
    </form>
</div>

@endsection