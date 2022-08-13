@extends('admin.layout.app')

@section('content')

<div class="col-md-6">
    <div class="card">
        <div class="card-header">Update Profile</div>

<div class="card-body">
    <form action="{{ route('update.user.profile') }}" method="POST">

        @csrf
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control input-lg" name="name" 
            value="{{ $user->name }}" placeholder="username">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" 
            value="{{ $user->email }}" placeholder="email address">
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

    </div>

  </div>

</div>

@endsection