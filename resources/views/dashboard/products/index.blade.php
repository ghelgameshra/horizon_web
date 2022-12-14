@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fs-3">All Products</h1>
</div>

@if( session()->has('success') )
{{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Yeeey</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> --}}
    @include('dashboard.products.modal')
@endif


<div class="row" style="overflow-x: auto">
    <div class="table-responsive">
        @can('admin')
        <a href="/dashboard/products/create" class="btn btn-dark mb-2 fs-5 w-100"><i class="bi bi-plus"></i> Add Products</a>
        @endcan
        <table class="table table-striped table-lg fs-6">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>@currency($product['price'])</td>
                <td>

                    <a href="/dashboard/products/{{ $product->slug }}" class="badge bg-success"><i class="bi bi-info-circle px-1 py-1 fs-6"></i></a>
                    @can('admin')    
                    <a href="/dashboard/products/{{ $product->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square px-1 py-1 fs-6"></i></a>
                    <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')"><i class="bi bi-x-circle px-1 py-1 fs-6"></i></button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>

    // tutup modal notifikasi
    document.querySelector('#notification-modal').addEventListener('click', evt => {
        if( !evt.target.matches('button') ) return;
        const button = document.querySelector('#notification-modal');
        button.classList.remove('show', 'd-block');
    })

</script>

@endsection