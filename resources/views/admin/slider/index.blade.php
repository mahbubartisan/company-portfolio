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

                        <div class="card-header">All Sliders</div>
                   

                <table class="table table-hover">
                    <thead>
                      <tr>
                        
                        <th scope="col">SL NO.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                        @php ($i =1)

                        @foreach ($sliders as $slider)
                        
                      <tr>
                          <th scope="row">{{ $i++}}</th>
                          <td>{{ $slider->title }}</td>
                          <td>{{ $slider->description }}</td>
                          <td><img src="{{ asset($slider->image) }}" alt="" style="height: 50px; width:55px"></td>
                          <td>
                          <a href="{{ url('slider/edit/'.$slider->id)}}" class="btn btn-info">Edit</a>
                          <a href="{{ url('slider/delete/'.$slider->id)}}" class="btn btn-danger">Delete</a>
                          </td>
                          
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Slider</div>

                    <div class="card-body">
                    <form action="{{ route('add.slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">title</label>
                          <input type="text" class="form-control" name="title">

                          @error('title')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Description</label>
                            <textarea type="text" class="form-control" name="description"> </textarea>
  
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
  
                            @error('Image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
            
                        <button type="submit" class="btn btn-primary">Add Slider</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>

    </div>

    @endsection