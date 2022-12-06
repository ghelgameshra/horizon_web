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
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="mb-2">
            <label for="slug" class="form-label">Product Code</label>
            <input type="text" class="form-control" id="slug" name="slug" disabled readonly>
        </div>

        <div class="mb-2">
            <label for="price" class="form-label">Product Code</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Rp.">
        </div>
        
        <div class="mb-2">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add product</button>
    </form>
</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        // fetch('/dashboard/products/checkCode?name=' + name.value)
        //     .then(response => response.json())
        //     .then(data => slug.value = data.slug)
        fetch('/dashboard/products/checkSlug?name='+name.value)
            .then( response => response.json() )
            .then( data => slug.value = data.slug )

    });
</script>

@endsection