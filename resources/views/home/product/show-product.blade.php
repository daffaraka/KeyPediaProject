@extends('home.layout')
@section('content')
    <div class="row bg-light rounded border shadow">
        <div class="col-md-5">
            <img src="{{asset('image_product/'.$showProduct->image_product)}}" class="img-fluid rounded pt-2 pb-2" alt="">
        </div>
        <div class="col-md-6 mt-0 pt-0">
            <h1>{{$namaCategory}} </h1>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h6>{{$showProduct->nama_product}} </h6>
                    <h6> Rp.{{number_format($showProduct->harga_product,2)}} </h6>
                    <h6>{{$showProduct->deskripsi_product}} </h6>
                    <h6>Disukai oleh : 91 orang </h6>
                </div>
                <div class="card-footer">
                    <button class="btn btn-warning">Add to cart</button>
                </div>
            </div>

        </div>
    </div>
@endsection