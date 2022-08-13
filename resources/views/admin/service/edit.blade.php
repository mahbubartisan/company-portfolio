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

                            <div class="card-header">Update Services</div>
        
                            <div class="card-body">
                            <form action="{{ url('update/service/'. $service->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="service_image" value="{{ $service->image }}">
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">title</label>
                                  <input type="text" class="form-control" name="title" value="{{ $service->title }}">
        
                                  @error('title')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
        
                                
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Service Image</label>
                                    <input type="file" class="form-control" name="image" value="{{ $service->image }}">
          
                                    @error('service_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>

                                  <div class="form-group">
                                    <img src="{{ asset($service->image) }}" alt="image" style="height: 100px; weight:100px">
                                 </div>
        
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"> Description</label>
                                    <textarea type="text" class="form-control" name="description">{{ $service->description }}</textarea>
          
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
        
                                  
        
                                <button type="submit" class="btn btn-primary">Update Service</button>
                              </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection
