@extends('home.layout')
@section('content')
    <div class="row bg-light rounded border shadow p-3">
        <div class="col-md-5">
            <img src="{{asset('image_product/'.$cart->image_product)}}" class="img-fluid rounded pt-2 pb-2" alt="">
        </div>
        <div class="col-md-6 mt-0 pt-0">
            <label class="badge badge-secondary"><h6 class="mb-0">{{$namaCategory}} </h6> </label> 
            <h1>{{$cart->nama_product}} </h1>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h6> Rp.{{number_format($cart->harga_product,2)}} </h6>
                    <h6>{{$cart->deskripsi_product}} </h6>
                    <h6>Disukai oleh : 91 orang </h6>
                    
                    <td>
                        {{-- <form action="{{route('updateQty',$cart->cart_id)}}" method="get"> --}}

                          <h6>Jumlah Barang : {{$cart->quantity}} </h6>  </td>
                        {{-- </form> --}}

                </div>
                <div class="card-footer">
                    <div class="input-group mb-3">
                        <div class="input-group-propend">
                            {{-- <form action="{{route('updateQtyOnPage',$cart->cart_id)}}" method="get">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form> --}}
        
                            <form action="{{route('checkout',$cart->cart_id)}}" method="POST" class="mt-2">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-auto" >Checkout</button>
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>
@endsection