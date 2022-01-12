@extends('home.layout')
@section('content')
    <div class="row pb-5">
        <div class="col-md-4 border pt-3 pb-3">
            <form action="{{route('storeCategory')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1" class="font-weight-bolder">Kategori</label>
                  <input type="text" class="form-control" name="category" aria-describedby="emailHelp">
                  <small class="form-text text-muted">Masukkan jenis kategori anda</small>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col"> Action </th>
                  </tr>
                </thead>    
                <tbody>
                    @foreach ($category as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->category}}</td>
                        <td> 
                            <a href="{{ route('editCategory',['id' => $data->id]) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('destroyCategory',['id' => $data->id]) }}" class="btn btn-danger">Delete</a> </td>
                        </td>
                      </tr>
                    @endforeach
            
                </tbody>
              </table>
        </div>
    </div>

    
@endsection