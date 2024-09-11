@extends('master')

@section('title')
Daftar Kategori
@endsection

@section('content')

    <a href="/category/create" class="btn btn-primary mb-3">Tambah</a>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($category as $key=>$value)
                    <tr>
                        <td>{{$loop->index + 1}}</th>
                        <td>{{$value->name}}</td>
                        <td class="btn-group" role="group" aria-label="Basic example">
                            <form action="/category/{{$value->id}}" method="POST">
                                @csrf
                                <a href="/category/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger my-1" value="Delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr colspan="3">
                        <td>No data</td>
                    </tr>  
                @endforelse              
            </tbody>
        </table>
@endsection