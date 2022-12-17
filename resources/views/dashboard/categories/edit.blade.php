@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fs-3">Edit category</h1>
</div>



<div class="col-lg-3">
    <form method="post" action="/dashboard/categories/{{ $category->slug }}">
        @method('put')
        @csrf
        <div class="mb-2">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-2">
            <label for="slug" class="form-label">Category Code</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug', $category->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update product</button>
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