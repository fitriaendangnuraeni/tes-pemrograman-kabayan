@extends('master')

@section('title')
Formulir Transaksi
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form action="/transaction/store/{{$num}}" method="POST">
                @csrf
                @for ($i=0 ; $i < $num; $i++)
                <div class="form-group">
                    <label for="product_id">Nama Produk</label>
                    <select class="form-control" id="product_id" name="product_id[]">
                        <option selected>Pilih Produk</option>
                        @foreach ($products as $key=>$value)
                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                        @endforeach
                    </select>
                </div>
                @error('product_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="item">Total item</label>
                    <input type="number" class="form-control" id="item" name="item[]" placeholder="Tulis total item produk disini!">
                </div>
                @error('item')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                @endfor
                <!-- <div class="form-group">
                    <label for="payment">Metode Pembayaran</label>
                    <select class="form-control" id="payment" name="payment">
                        <option selected>Pilih Metode Pembayaran</option>
                        <option value="cash">Tunai</option>
                        <option value="debit">Debit</option>
                        <option value="emoney">Uang Elektronik</option>
                        <option value="qris">QRIS</option>
                    </select>
                </div>
                @error('payment')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror -->
                
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
</div>
