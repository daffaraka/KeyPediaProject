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
                    <input type="file" class="custom-file-input @error('image_product') is-invalid @enderror" name="image_product" id="image_product" >
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
                        <option value="{{$data->id}}" name="category_id">{{$data->category}} </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Tentukan nama keyboard</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bolder">Nama Keyboard</label>
                    <input type="text" class="form-control" name="nama_product" aria-describedby="emailHelp">
                    <small class="form-text text-muted">Tentukan nama keyboard</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bolder">Harga</label>
                    <input type="text" class="form-control" name="harga_product" aria-describedby="emailHelp">
                    <small class="form-text text-muted">Tentukan harga keyboard</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bolder">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi_product" aria-describedby="emailHelp">
                    <small class="form-text text-muted">Deskripsikan keyboard</small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
       
    </form>               
   
  


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
<script type="text/javascript">
      
     // Show image sebelum upload 
    $(document).ready(function (e) {
    
    
        $('#image_product').change(function(){
                    
            let reader = new FileReader();
        
            reader.onload = (e) => { 
        
            $('#preview-image-before-upload').attr('src', e.target.result); 
            }
        
            reader.readAsDataURL(this.files[0]); 
        
        });
    
    });
</script>
@endsection