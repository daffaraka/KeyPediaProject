@extends('home.layout')
@section('content')
    <div class="row bg-light rounded border shadow p-3">
        <div class="col-md-5">
            <img src="{{asset('image_product/'.$showProduct->image_product)}}" class="img-fluid rounded pt-2 pb-2" alt="">
        </div>
        <div class="col-md-6 mt-0 pt-0">
            <label class="badge badge-secondary"><h6 class="mb-0">{{$namaCategory}} </h6> </label> 
            <h1>{{$showProduct->nama_product}} </h1>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h6> Rp.{{number_format($showProduct->harga_product,2)}} </h6>
                    <h6>{{$showProduct->deskripsi_product}} </h6>
                    <h6>Disukai oleh : 91 orang </h6>
                </div>
                <div class="card-footer">
                   <form action="{{route('addToCart',$showProduct->product_id)}}" method="POST">
                    @csrf
                    
                    <button type="submit" class="btn btn-warning mt-auto" href="">Add to checkout page</button>
                  
                    </form>
                        
                   
                </div>
            </div>

        </div>
    </div>
@endsection