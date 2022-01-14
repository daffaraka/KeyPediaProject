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
        <th scope="row">{{$data->id_transaksi}}</th>
        <td>Rp.{{number_format($data->harga_total)}}</td>    
        <td>{{$data->created_at}}</td>

        <td>
          <a href="{{route('detailTransaksi',$data->id_transaksi)}}" class="btn btn-info">Detail Transaksi</a>
        </td>
      </tr>
      
      @endforeach
      
    </tbody>
  </table>
@endsection