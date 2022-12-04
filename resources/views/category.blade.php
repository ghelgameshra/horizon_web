@extends('layouts.main')


@section('container')
    <h1 class="text-center mb-5">{{$judul}}</h1>

    @include('partials.category')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 50px">No.</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $key=>$p)
            <tr>
                <td>{{$key+1}} </td>
                <td>{{$p["name"]}}</td>
                <td>{{ $p->category['name'] }}</td>
                <td> @currency($p["price"]) </td>
                <td>{{$p["updated_at"]}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection