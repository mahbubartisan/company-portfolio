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

                        <div class="card-header">About</div>
                   

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

                        @foreach ($abouts as $about)
                        
                      <tr>
                          <th scope="row">{{ $i++}}</th>
                          <td>{{ $about->title }}</td>
                          <td>{{ $about->short_dsc }}</td>
                          <td>{{ $about->long_dsc }}</td>
                          <td>
                          <a href="{{ url('about/edit/'.$about->id)}}" class="btn btn-info">Edit</a>
                          <a href="{{ url('about/delete/'.$about->id)}}" class="btn btn-danger"
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
                    <div class="card-header">Add About Info</div>

                    <div class="card-body">
                    <form action="{{ route('add.about') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">title</label>
                          <input type="text" class="form-control" name="title">

                          @error('title')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Short Description</label>
                            <textarea type="text" class="form-control" name="short_dsc"> </textarea>
  
                            @error('short_dsc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Long Description</label>
                            <textarea type="text" class="form-control" name="long_dsc"> </textarea>
  
                            @error('long_dsc')
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