@extends('master')

@section('title')
Daftar Produk
@endsection

@section('content')

    <div class="row">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Produk</th>
                        <th scope="col">Gambar Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($products as $key=>$value)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$value->code}}</td>
                    <td><img src="{{asset($value->image)}}" class="img-thumbnail" alt="..." width="150px" ></td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->category->name}}</td>
                    <td>{{$value->stock}}</td>
                    <td>{{$value->price}}</td>
                    <td>
                        <form action="/product/{{$value->id}}" method="POST">
                            @csrf
                            <a href="/product/{{$value->id}}/edit" class="btn btn-primary my-1 btn-sm">Edit</a>
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger my-1 btn-sm" value="Delete">
                        </form>
                    </td>
                </tr>
                @empty
                <th scope="row" colspan="7">belum ada produk</th>
                @endforelse 
                </tbody>
            </table>
        </div>
    </div>
@endsection