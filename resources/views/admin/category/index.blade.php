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

                        <div class="card-header">All Categories</div>
                   

                <table class="table">
                    <thead>
                      <tr>
                        
                        <th scope="col">SL NO.</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Created_At</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                        
                      <tr>
                          <th scope="row">{{ $categories->FirstItem()+$loop->index}}</th>
                          <td>{{ $category->category_name }}</td>
                          <td>{{ $category->users->name}}</td>
                          <td>{{ $category->created_at->diffForHumans() }}</td>
                          <td>
                          <a href="{{ url('category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
                          <a href="{{ url('category/trash/'.$category->id)}}" class="btn btn-danger">Trash</a>
                          </td>
                          
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

{{ $categories->links() }}

                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Category</div>

                    <div class="card-body">
                    <form action="{{ route('add.category') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Category Name</label>
                          <input type="text" class="form-control" name="category_name">

                          @error('category_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                       
            
                        <button type="submit" class="btn btn-primary">Add Category</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>


        {{-- Trash Table --}}

        <div class="container">

          <div class="row">

              <div class="col-md-8">
                  <div class="card">
                      
                      <div class="card-header">Trash Categories</div>
                 

              <table class="table">
                  <thead>
                    <tr>
                      
                      <th scope="col">SL NO.</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">User</th>
                      <th scope="col">Created_At</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                      @foreach ($trashitems as $trashitem)
                      
                    <tr>
                        <th scope="row">{{ $categories->FirstItem()+$loop->index}}</th>
                        <td>{{ $trashitem->category_name }}</td>
                        <td>{{ $trashitem->users->name}}</td>
                        <td>{{ $trashitem->created_at->diffForHumans() }}</td>
                        <td>
                        <a href="{{ url('category/restore/'.$trashitem->id)}}" class="btn btn-info">Restore</a>
                        <a href="{{ url('category/delete/'.$trashitem->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                        
                    </tr>
                    @endforeach
                  </tbody>
                </table>

{{ $trashitems->links() }}

              </div>
          </div>

          <div class="col-md-4">
              
          </div>

          </div>
      </div>


    </div>
    
    @endsection
