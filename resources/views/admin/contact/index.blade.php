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

                        <div class="card-header">Contact Detail</div>
                   

                <table class="table table-hover">
                    <thead>
                      <tr>
                        
                        <th scope="col">SL NO.</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                        @php ($i =1)

                        @foreach ($contacts as $contact)
                        
                      <tr>
                          <th scope="row">{{ $i++}}</th>
                          <td>{{ $contact->address }}</td>
                          <td>{{ $contact->email }}</td>
                          <td>{{ $contact->phone }}</td>
                          <td>
                          <a href="{{ url('edit/contact/'.$contact->id)}}" class="btn btn-info">Edit</a>
                          <a href="{{ url('delete/contact/'.$contact->id)}}" class="btn btn-danger"
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
                    <div class="card-header">Add Contact Info</div>

                    <div class="card-body">
                    <form action="{{ route('add.contact') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <textarea type="text" class="form-control" name="address"> </textarea>
  
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input type="email" class="form-control" name="email">

                          @error('email')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone">
  
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>

    </div>

    @endsection