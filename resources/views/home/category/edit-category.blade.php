@extends('home.layout')
@section('content')
    <div class="row pb-5">
        <div class="col-md-4 border pt-3 pb-3">
            <form action="{{route('updateCategory',$category->id)}}" method="POST" request="_token">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1" class="font-weight-bolder">Update Kategory</label>
                  <input type="text" class="form-control" name="category" aria-describedby="emailHelp" value={{$category->category}}>
                  <small class="form-text text-muted">Update jenis kategori </small>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
    </div>

    
@endsection