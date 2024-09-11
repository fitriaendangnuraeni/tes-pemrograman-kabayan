@extends('master')

@section('title')
Formulir Pembayaran
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Kode Transaksi : {{$transaction_code}}</h5>
            <br>
            <div class="row">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah Item</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0
                    @endphp
                @forelse ($transaction as $key=>$value)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$value->product->name}}</td>
                    <td>{{$value->item}}</td>
                    <td>{{$value->product->price}}</td>
                    <td>{{$value->product->price*$value->item}}</td>
                    @php
                    $total += $value->product->price*$value->item
                    @endphp
                </tr>
                @empty
                <th scope="row" colspan="5">belum ada produk</th>
                @endforelse 
                <tr>
                <td scope="row" colspan="4">Total Belanjaan</td>
                <td scope="row" colspan="4">{{$total}}</td>
                </tr>
                </tbody>
            </table>
        </div>

            <form action="/transaction/payment/{{$transaction_code}}" method="POST">
                @csrf
                <div class="form-group">
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
                @enderror
                <div class="form-group">
                    <label for="paid">Total dibayarkan</label>
                    <input type="number" class="form-control" id="paid" name="paid" placeholder="Khusus pembayaran tunai" >
                    <input name="total" type="hidden" value={{$total}}>
                </div>
                @error('paid')
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
