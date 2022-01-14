@extends('home.layout')
@section('content')
    <div class="row bg-light rounded border shadow p-3">
        <div class="col-md-5">
            <img src="{{asset('product_image/'.$showProduct->product_image)}}" class="img-fluid rounded pt-2 pb-2" alt="">
        </div>
        <div class="col-md-6 mt-0 pt-0">
            <label class="badge badge-secondary"><h6 class="mb-0">{{$namaCategory}} </h6> </label> 
            <h1>{{$showProduct->product_name}} </h1>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h6>Harga : Rp.{{number_format($showProduct->product_price,2)}} </h6>
                     <hr>
                    <h6>Deskripsi Product : <br> </h6>
                    <h6> {{$showProduct->product_description}} </h6>
                    <hr>
                </div>
                @auth
                <div class="card-footer">
                    
                        <form action="{{route('addToCart',$showProduct->product_id)}}" method="POST">
                        @csrf
                        
                        <button type="submit" class="btn btn-warning mt-auto" href="">Add to checkout page</button>
                      
                        </form>
                </div>
                @endauth
            </div>

        </div>
    </div>
@endsection