@extends('master')

@section('title')
Formulir Product
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form action="/product" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="code">Kode Produk</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Tulis kode produk disini!">
                </div>
                @error('code')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tulis nama produk disini!">
                </div>
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="category_id">Kategori Produk</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option selected>Pilih Category</option>
                        @foreach ($category as $key=>$value)
                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="stock">Stok Produk</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Tulis stok produk disini!">
                </div>
                @error('stock')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Tulis harga produk disini"></input>
                </div>
                @error('price')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                <label for="cover">Gambar</label>
                    <div>
                    <input type="file" id="image" name="image">
                    </div>
                </div>
                @error('image')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
</div>
