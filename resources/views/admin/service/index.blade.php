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

                        <div class="card-header">All Services</div>
                   

                <table class="table table-hover">
                    <thead>
                      <tr>
                        
                        <th scope="col">SL NO.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Short Description</th>
                        <th scope="col">Long Description</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                        @php ($i =1)

                        @foreach ($services as $service)
                        
                      <tr>
                          <th scope="row">{{ $i++}}</th>
                          <td>{{ $service->title }}</td>
                          <td><img src="{{ asset($service->image ) }}" alt=""></td>
                          <td>{{ $service->description }}</td>
                          <td>
                          <a href="{{ url('edit/service/'.$service->id)}}" class="btn btn-info">Edit</a>
                          <a href="{{ url('delet/service/'.$service->id)}}" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</a>
                          </td>
                          
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Services</div>

                    <div class="card-body">
                    <form action="{{ route('add.service') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">title</label>
                          <input type="text" class="form-control" name="title">

                          @error('title')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Service Image</label>
                            <input type="file" class="form-control" name="image">
  
                            @error('image')
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

                          

                        <button type="submit" class="btn btn-primary">Add Info</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>

    </div>

    @endsection