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

                        <div class="card-header">All Brand</div>
                   

                <table class="table table-hover">
                    <thead>
                      <tr>
                        
                        <th scope="col">SL NO.</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Brand Image</th>
                        <th scope="col">Created_At</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($brands as $brand)
                        
                      <tr>
                          <th scope="row">{{ $brands->FirstItem()+$loop->index}}</th>
                          <td>{{ $brand->brand_name }}</td>
                          <td><img src="{{ asset($brand->brand_img) }}" alt="" style="height: 50px; width:55px"></td>
                          <td>{{ $brand->created_at->diffForHumans() }}</td>
                          <td>
                          <a href="{{ url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
                          <a href="{{ url('brand/delete/'.$brand->id)}}" class="btn btn-danger">Delete</a>
                          </td>
                          
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

{{ $brands->links() }}

                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Brand</div>

                    <div class="card-body">
                    <form action="{{ route('add.brand') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                          <input type="text" class="form-control" name="brand_name">

                          @error('brand_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                            <input type="file" class="form-control" name="brand_img">
  
                            @error('brand_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
            
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>

    </div>

    @endsection