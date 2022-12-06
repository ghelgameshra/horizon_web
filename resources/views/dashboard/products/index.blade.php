@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fs-3">All Products</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
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
                <a href="/dashboard/products/{{ $product->code }}" class="badge bg-info"><span data-feather="info"></span></a>
                <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>

                <form action="/dashboard/products" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0"><span data-feather="trash"></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection