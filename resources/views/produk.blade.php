@extends('layouts.main')


@section('container')
    <h1 class="text-center mb-5">{{$judul}}</h1>

    @include('partials.category')

    <div style="overflow-x: auto;" class="fs-6">
        <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th style="width: 35px">No.</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Update</th>
                    <th class="text-center" style="width: 100px">Images</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->category->name }}</td>
                    <td> @currency($p["price"]) </td>
                    <td>{{ $p->updated_at }}</td>
    
                    @if ($p->image)
                        <td class="text-center"><a href="{{ asset('storage/' . $p->image) }}" class="btn btn-dark" style="font-size: 12px" target="_blank"><i class="bi bi-eye"></i> Show</a></td>
                    @else
                        <td class="text-center"><a href="{{ asset('storage/product-images/abstract-wallpaper-2102021935322.jpg') }}" class="btn btn-dark" style="font-size: 12px" target="_blank"><i class="bi bi-eye"></i> Show</a></td>
                    @endif
    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection