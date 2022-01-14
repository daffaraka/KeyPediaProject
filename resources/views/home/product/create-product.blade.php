@extends('home.layout')
@section('content')

    <form action="{{route('storeProduct')}}" method="POST" enctype="multipart/form-data">
        <div class="row" style="padding: 20px;box-shadow: grey 0 0 3px; border-radius:5px;">
            @csrf
            <div class="col-md-5" >
                <label for="" class="font-weight-bolder">Foto Product</label>
                <img id="preview-image-before-upload"
                class="rounded"
                src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                alt="preview image" style="height:250px; max-width:400px; max-height: 250px; display:block; margin:0px 0px 15px 0; auto; padding: 10px; box-shadow : grey 1px 1px 2px">
        
                <div class="input-group mb-3">
                    
                    <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                    </div>
        
                    <div class="custom-file">
                    <input type="file" class="custom-file-input @error('product_image') is-invalid @enderror" name="product_image" id="product_image" >
                    <label class="custom-file-label"></label>
                    </div>
                </div>                                  
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bolder">Kategori</label>
                    <select type="text" class="form-control" name="category_id" aria-describedby="emailHelp">
                        <option value="">Pilih Kategori</option>
                        @foreach ($category as $data)
                        <option value="{{$data->category_id}}" name="category_id">{{$data->category_name}} </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Tentukan nama keyboard</small>
                    
                  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bolder">Nama Keyboard</label>
                    <input type="text" class="form-control" name="product_name" aria-describedby="emailHelp">
                    <small class="form-text text-muted">Tentukan nama keyboard</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bolder">Harga</label>
                    <input type="text" class="form-control" name="product_price" aria-describedby="emailHelp">
                    <small class="form-text text-muted">Tentukan harga keyboard</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bolder">Deskripsi</label>
                    <input type="text" class="form-control" name="product_description" aria-describedby="emailHelp">
                    <small class="form-text text-muted">Deskripsikan keyboard</small>
                </div>

                @if (count($errors) > 0)
                    
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                    
                            <li class="text text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
       
    </form>               
   
  


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
  </script>
<script type="text/javascript">
      
     // Show image sebelum upload 
    $(document).ready(function (e) {
    
    
        $('#product_image').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-image-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
    
    });
</script>
@endsection