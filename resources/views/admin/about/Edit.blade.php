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

                    <div class="card-header">Update About Info</div>

                    <div class="card-body">
                    
                        <form action="{{ url('update/about'. $abouts->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">title</label>
                              <input type="text" class="form-control" name="title" value="{{ $abouts->title }}">
    
                              @error('title')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"> Short Description</label>
                                <textarea type="text" class="form-control" name="short_dsc">{{ $abouts->short_dsc }}</textarea>
      
                                @error('short_dsc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
    
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Long Description</label>
                                <textarea type="text" class="form-control" name="long_dsc">{{$abouts->long_dsc}}</textarea>
      
                                @error('long_dsc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>


            <br>
                        <button type="submit" class="btn btn-primary">Update About</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>

@endsection
