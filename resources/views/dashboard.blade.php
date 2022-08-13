<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>Welcome Back... {{Auth::user()->name }} </b>

            <b style="float:right; color:crimson">Total Users: {{ count($users) }}</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">

            <div class="row">

                <table class="table table-hover">
                    <thead>
                      <tr>
                        
                        <th scope="col">SL NO.</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created_At</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                          @foreach ($users as $user)

                      <tr>
                          <th scope="row">{{ $i++ }}</th>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->created_at->diffForHumans() }}</td>
                          
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
</x-app-layout>
