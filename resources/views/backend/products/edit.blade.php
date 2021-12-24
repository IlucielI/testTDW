@extends('layouts/templete_backend')
@section('contents')
<div class="container-fluid">
    <div class="container w-75 text-dark mt-5">
        <form action="/admin/editProduct/{{$product->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Nama Product</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Product" required="" value="{{old('name', $product->name)}}">
                         @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="price">Harga Product</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Rp" required="" value="{{old('price', $product->price)}}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="price">Photo Product</label>
                    </div>
                    <div class="col-md-8">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="validatedCustomFile">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-warning w-75">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
    </script>
@endsection
