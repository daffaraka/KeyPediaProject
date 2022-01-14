@extends('home.layout')
@section('content')
<h1> Riwayat Transaksi</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th> Harga Total</th>
        <th> Tanggal transaksi</th>
        <th> Action </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transaksi as $data)
      <tr>
        <th scope="row">{{$data->transaction_id }}</th>
        <td>Rp.{{number_format($data->product_price)}}</td>    
        <td>{{$data->created_at}}</td>

        <td>
          <a href="{{route('detailTransaksi',$data->transaction_id )}}" class="btn btn-info">Detail Transaksi</a>
        </td>
      </tr>
      
      @endforeach
      
    </tbody>
  </table>
@endsection