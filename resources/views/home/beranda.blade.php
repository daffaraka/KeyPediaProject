@extends('home.layout')

@section('content')

<div class="row">
    
    @if (count($product) == 0)
        <div class="col-md-12 text-center mt-5">
            <h1>Belum ada product</h1>
        </div>
          
        
    @endif

    @foreach ($product as $data)
        <div class="col-3 mb-5">
            <div class="card h-00 shadow">
                <!-- Product image-->
                <img class="card-img-top rounded p-2 border" src="{{asset('image_product/'.$data->image_product)}}" a/>
                <!-- Product details-->
                <div class="card-body pb-3">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">{{$data->nama_product}}</h5>
                        <!-- Product price-->
                        Rp.{{number_format($data->harga_product,2)}}
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer pt-0 border-top-0 bg-transparent text-center">
                    {{-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('showProduct',$data->product_id)}}">Detail product</a></div> --}}
                   
                    <a class="btn btn-outline-info mt-auto" href="{{route('showProduct',$data->product_id)}}">Lihat Produk</a>
        
                </div>
            </div>
        </div>
    @endforeach
</div>
{{$product->links('pagination::bootstrap-4')}}

@endsection