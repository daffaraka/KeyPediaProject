@extends('home.layout')
@section('content')
    <div class="row">
        <div class="col-md-12 mr-0 p-0">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"> Shopping Cart </h4>
                    
                    @if (count($cart) == 0 )
                    <h1> Keranjang anda kosong</h1>
                    @else
                    <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 120px;">Foto Product</th>
                            <th class="pl-5">Nama Product</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah Barang</th>
                            <th> Tanggal ditambahkan </th>
                            <th> Pilihan </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                           
                           @foreach ($cart as $data)
                           
                            @csrf
                                <tr>
                                    <th scope="row"> <img src="{{asset('image_product/'.$data->image_product)}}" class="border" style="width:120px;" alt=""> </th>
                                    <td class="pl-5">{{$data->nama_product}}</td>
                                    <td>Rp.{{number_format($data->harga_product,2)}}</td>

                                    <form action="{{route('updateQty',$data->cart_id)}}" method="get">
                                    <td><input id="ticketNum" type="number" name="quantity" min="1" value="{{$data->quantity}}" style="width: 50px;"></td>
                                    <td>{{$data->created_at}}</td>
                                    <td>
                                    
                                            <button type="submit" class="btn btn-warning">Update Qty</button>
                                    </form>

                                        <form>
                                            <a href="{{route('checkOutPage',$data->cart_id)}}" type="submit" class="btn btn-info mt-2">Checkout </a>
                                        </form>
                                       
                                       
                                        <form class="mt-2">
                                            <a href="{{route('deleteCart',$data->cart_id)}}" class="btn btn-danger">Delete</a>
                                        </form>
                                    
                                  
                             </tr>
                       

                      
                        @endforeach 
                          
                         
                        </tbody>
                    </table>
                    @endif
                    
                </div>
            </div>
        </div>
        {{-- <div class="col-md ml-0 p-0 bg">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title mb-4"> Jumlah </h4>
                    <hr>
                    <h5>Items : <label for="" class="badge badge-info">6</label> </h5>
                    <h5> Price : Rp.500000 </h5>
                    <button class="btn btn-dark btn-block rounded-0">Proceed</button>
                </div>
            </div>
        </div> --}}
    </div>
@endsection