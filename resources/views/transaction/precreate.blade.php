@extends('master')

@section('title')
Formulir Transaksi
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form action="/transaction/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="totalproduct">Jenis Produk</label>
                    <input type="number" class="form-control" id="totalproduct" name="totalproduct" placeholder="Tulis jumlah jenis produk disini! (Produk yang sama dianggap 1 produk)">
                </div>
                @error('totalproduct')
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