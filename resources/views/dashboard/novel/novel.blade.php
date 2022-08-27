@extends('main.dashboardMain')

@section('dashboard')
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title }}</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/dashboard/novel-controller/add" class="btn btn-sm btn-outline-secondary px-3 py-2 fw-bold">
          <i class="bi bi-file-earmark-plus fs-5"></i> Create New List Novel
        </a>
      </div>
    </div>

    {{-- Table Data Novel --}}
    <div class="d-flex justify-content-end me-5">
      <span>{{ $novel->links() }}</span>
    </div>
    <div class="table-responsive">
      <table class="table align-middle">
          <thead class="text-center">
            <tr>
             
              <th scope="col">No</th>
              
              <th scope="col">Action</th>

              <th scope="col">Name</th>

              <th scope="col">Type</th>

              <th scope="col">Finished/Ongoing</th>
              
              <th scope="col">Status</th>
              
              <th scope="col">Total Chapter</th>
              
              <th scope="col">Image</th>
              
            </tr>
          </thead>
          <tbody class="text-center">
            
            @foreach ($novel as $item)
                <tr>

                  <td class="fw-bold">{{ $loop->iteration + $novel->firstItem() - 1 }}</td>

                  <td>
                    <a href="{{ url('edit-novel/'.$item->id) }}" class="btn btn-primary btn-action"><i class="bi bi-pencil-fill"></i> Edit</a>
                    <a href="{{ url('delete-novel/'.$item->id) }}" onclick="deleteNovel(event, {{ $item->id }})" class="btn btn-danger btn-action"><i class="bi bi-trash-fill"></i> Delete</a>
                  </td>

                  <td class="text-truncate" style="max-width: 100px">{{ $item->name }}</td>

                  <td>{{ $item->type }}</td>

                  <td>
                    @if ($item->condition == '0')
                      <b class="text-success">Finished</b>
                        @elseif ($item->condition == '1')
                        <b class="text-primary">On Going</b>
                    @endif
                  </td>

                  <td> 
                    @if ($item->status == '0')
                      <b class="text-danger">Inactive</b>

                      @elseif ($item->status == '1')
                      <b class="text-primary">Active</b>  
                    @endif
                  </td>

                  <td>{{ $item->total_chap }}</td>
                  

                  <td>
                    <img src="{{ asset('assets/uploads/novel/'.$item->image) }}" alt="Cover {{ $item->name }}">
                  </td>

                </tr>
            @endforeach

          </tbody>
        </table>    
    </div>

  </main>

@endsection


@section('delete')
  function deleteNovel(e, novel_id) {
    e.preventDefault();

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = '/delete-novel/' + novel_id;
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })

  }  
@endsection