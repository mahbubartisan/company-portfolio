<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>Image Gallery</b>

            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">

            <div class="row">

                <div class="col-md-8">

                    <div class="card-group">
                       @foreach ($images as $image)

                       <div class="col-md-4 mt-3">
                           <div class="card">
                               <img src="{{ asset($image->image) }}" alt="">
                           </div>

                       </div>
                           
                       @endforeach
                    </div>
                    
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Multiple Images</div>

                    <div class="card-body">
                    <form action="{{ route('add.images') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Multiple Images</label>
                            <input type="file" class="form-control" name="images[]" multiple="">
  
                            @error('multi_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
            
                        <button type="submit" class="btn btn-primary">Upload Image</button>
                      </form>
                    </div>
                </div>
            </div>

            </div>
        </div>

    </div>
</x-app-layout>
