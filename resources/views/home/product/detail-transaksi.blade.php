@extends('home.layout')
@section('content')
    <div class="row bg-light rounded border shadow p-3">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th> Gambar </th>
                <th>Quantity</th>
                <th> Harga Total</th>
                <th> Tanggal transaksi</th>
               
              </tr>
            </thead>
            <tbody>
            
              <tr>
                <td>{{$detailTransaksi->transaction_id }}</td>
                <td class="w-25"><img src="{{asset('product_image/'.$detailTransaksi->product_image)}}" class="w-50 rounded pt-2 pb-2"  alt="">
                </td>
                <th scope="row">{{$detailTransaksi->quantity}}</th>
                <td>Rp.{{number_format($detailTransaksi->product_price)}}</td>    
                <td>{{$detailTransaksi->created_at}}</td>
        
               
              </tr>
              
           
              
            </tbody>
          </table>
        {{-- <div class="col-md-5 justify-center">
            <img src="{{asset('image_product/'.$detailTransaksi->image_product)}}" class="img-fluid h-75 rounded pt-2 pb-2" alt="">
        </div>
        <div class="col-md-6 mt-0 pt-0">
            <label class="badge badge-secondary"><h6 class="mb-0">{{$detailTransaksi->quantity}} </h6> </label> 
            <h1>{{$detailTransaksi->nama_product}} </h1>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h6> Rp.{{number_format($detailTransaksi->harga_product,2)}} </h6>
                    <h6>{{$detailTransaksi->deskripsi_product}} </h6>
                </div>
            </div> --}}

        </div>
    </div>
@endsection