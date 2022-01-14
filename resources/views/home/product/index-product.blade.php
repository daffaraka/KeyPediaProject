@extends('home.layout')
@section('content')

    <h1>Product Admin</h1>
    <a href="{{route('createProduct')}}" class="btn btn-info mb-2">Tambah product</a>
    <hr style="height:0.2px;">

    <div class="row">
        @if (count($product) == 0 )
            <h1 class="text-center"> Belum ada product</h1>
        @else
            @foreach ($product as $data)
            <div class="col-3 mb-5">
                <div class="card h-100 shadow">
                    <!-- Product image-->
                    <img class="card-img-top rounded p-2 border" src="{{asset('product_image/'.$data->product_image)}}" a/>
                    <!-- Product details-->
                    <div class="card-body p-4 pb-0">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$data->nama_product}}</h5>
                            <!-- Product price-->
                            Rp.{{number_format($data->harga_product,2)}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                        {{-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('showProduct',$data->product_id)}}">Detail product</a></div> --}}
                        <a class="btn btn-warning mt-auto" href="{{route('editProduct',$data->product_id)}}">Edit Product</a>
                        <a class="btn btn-outline-danger mt-2" href="{{route('destroyProduct',$data->product_id)}}">Hapus Produk</a>

                    </div>
                </div>
            </div>
            
            @endforeach

            
        @endif
            
    

    
    </div>
    
@endsection