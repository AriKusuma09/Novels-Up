@extends('main.dashboardMain')

@section('dashboard')
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title }}</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
    </div>

    {{-- Table Data Novel --}}
    <div class="table-responsive mb-5">
        <h2>Admin</h2>
        <table class="table align-middle">
            <thead class="text-center">
              <tr>
               
                <th scope="col">No</th>
                
                <th scope="col">Name</th>
  
                <th scope="col">Username</th>
  
                <th scope="col">Email</th>
                
                <th scope="col">Role As</th>
  
                <th scope="col">Created At</th>
                
              </tr>
            </thead>
            <tbody class="text-center">
              @foreach ($admins as $admin)
                  
                <tr>
                  <td class="fw-bold">{{ $loop->iteration}}</td>
  
                  <td>{{ $admin->name }}</td>
  
                  <td>{{ $admin->username }}</td>
  
                  <td>{{ $admin->email }}</td>
  
                  <td>
                    @if ($admin->role_as == '0')
                      <b class="text-success">User</b>
                      @elseif ($admin->role_as == '1')
                      <b class="text-primary">Admin</b>
                    @endif
                  </td>
  
                  <td>{{ $admin->created_at->format('d - m - Y') }}</td>
  
                </tr>
              
              @endforeach
  
            </tbody>
          </table>
           

    {{-- Table Data Novel --}}
    <div class="table-responsive mt-5">
        <h2>User</h2>
      <table class="table align-middle">
          <thead class="text-center">
            <tr>
             
              <th scope="col">No</th>
              
              <th scope="col">Name</th>

              <th scope="col">Username</th>

              <th scope="col">Email</th>
              
              <th scope="col">Role As</th>

              <th scope="col">Created At</th>
              
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($users as $item)
                
              <tr>
                <td class="fw-bold">{{ $loop->iteration}}</td>

                <td>{{ $item->name }}</td>

                <td>{{ $item->username }}</td>

                <td>{{ $item->email }}</td>

                <td>
                  @if ($item->role_as == '0')
                    <b class="text-success">User</b>
                    @elseif ($item->role_as == '1')
                    <b class="text-primary">Admin</b>
                  @endif
                </td>

                <td>{{ $item->created_at->format('d - m - Y') }}</td>

              </tr>
            
            @endforeach

          </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <span>{{ $users->links() }}</span>
        </div>    
    </div>

    

  </main>

@endsection