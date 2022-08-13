@extends('admin.layout.app')

@section('content')

    <div class="py-12">
        <div class="container">

            <div class="row">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Update Category</div>

                    <div class="card-body">
                    <form action="{{ url('/category/update/'. $categories->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Category Name</label>
                          <input type="text" class="form-control" name="category_name" value="{{ $categories->category_name }}">

                          @error('category_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                       
            
                        <button type="submit" class="btn btn-primary">Update Category</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
    
    @endsection
