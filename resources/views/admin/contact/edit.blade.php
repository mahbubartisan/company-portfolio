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

                        <div class="card-header">Update Contact Detail </div>
                   
                    <div class="card-body">
                    <form action="{{ url('/update/contact/'. $contacts->id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <textarea type="text" class="form-control" name="address">{{ $contacts->address }}</textarea>
  
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input type="email" class="form-control" name="email"
                          value="{{ $contacts->email }}">

                          @error('email')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $contacts->phone }}">
  
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>

    </div>

    @endsection