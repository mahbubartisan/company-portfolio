@extends('admin.layout.app')

@section('content')
    
    <div class="py-12">
        <div class="container">

            <div class="row">

            <div class="col-md-8">
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      @endif

                    <div class="card-header">Update Slider</div>

                    <div class="card-body">
                    <form action="{{ url('/brand/update/'. $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="old_img" value="{{ $slider->image }}">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">title</label>
                            <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
  
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <textarea type="text" class="form-control" name="description">{{ $slider->description }}</textarea>
  
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slider Image</label>
                            <input type="file" class="form-control" name="image" value="{{ $slider->image }}">
  
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <img src="{{ asset($slider->image) }}" alt="image" style="height: 100px; weight:100px">
                          </div>


            <br>
                        <button type="submit" class="btn btn-primary">Update Slider</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>

@endsection
