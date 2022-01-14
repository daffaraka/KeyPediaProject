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

                @if (count($errors) > 0)
                    
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li class="text text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </div>
        <div class="col-md-8">
          @if (count($category)==0)
           <h1 class="text-center"> Belum ada category</h1>
          @else
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
            @endif
        </div>
    </div>

    <script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
      <script src="{{asset('js/bootstrap.js')}}"></script>
    </script>
@endsection