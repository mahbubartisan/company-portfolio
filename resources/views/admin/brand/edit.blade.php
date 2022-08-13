@extends('admin.layout.app')

@section('content')
    
    <div class="py-12">
        <div class="container">

            <div class="row">

            <div class="col-md-4">
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      @endif

                    <div class="card-header">Update Brand</div>

                    <div class="card-body">
                    <form action="{{ url('/brand/update/'. $brands->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="old_img" value="{{ $brands->brand_img }}">

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                          <input type="text" class="form-control" name="brand_name" value="{{ $brands->brand_name }}">

                          @error('brand_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                            <input type="file" class="form-control" name="brand_img" value="{{ $brands->brand_img }}">
  
                            @error('brand_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <img src="{{ asset($brands->brand_img) }}" alt="image" style="height: 100px; weight:100px">
                          </div>


            <br>
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>

@endsection
