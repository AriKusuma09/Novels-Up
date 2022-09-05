@extends('main.dashboardMain')

@section('dashboard')
 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title }}</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/dashboard/chapter-controller/add" class="btn btn-sm btn-outline-secondary px-3 py-2 fw-bold">
          <i class="bi bi-file-earmark-plus fs-5"></i> Create New List Chapter
        </a>
      </div>
    </div>

    {{-- Table Data Novel --}}
    <div class="d-flex justify-content-end me-5">
      {{-- <span>{{ $chapter->links() }}</span> --}}
    </div>
    <div class="table-responsive">
      <table class="table align-middle" id="chapterTable">
          <thead class="text-center">
            <tr>
             
              <th class="text-center" scope="col">No</th>
              
              <th class="text-center" scope="col">Action</th>

              <th class="text-center" scope="col">Name</th>

              <th class="text-center" scope="col">Chapter</th>
              
              <th class="text-center" scope="col">Created At</th>

              <th class="text-center" scope="col">Deleted At</th>
              
              <th class="text-center" scope="col">Cover</th>
              
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($trash as $item)
                
              <tr>
                <td class="fw-bold">{{ $loop->iteration }}</td>

                <td>
                    <div class="d-flex justify-content-center">
                      <div class="mx-1">
                        <form action="/dashboard/trash/restore/{{ $item->id }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-primary text-white"><i class="bi bi-skip-backward"></i> Restore</button>
                      </form>
                      </div>
                      <div class="mx-1">
                        <form action="/dashboard/trash/delete/{{ $item->id }}" method="POST">
                          @csrf
                            <button type="submit" class="btn btn-danger" onclick="deleteNovel(event, {{ $item->id }})"><i class="bi bi-trash"></i> Delete Permanently</button>
                        </form>
                      </div>
                    </div>
                </td>

                <td class="text-truncate text-center" style="max-width: 100px">{{ $item->name }}</td>

                <td class="text-center">{{ $item->total_chap }}</td>

                <td class="text-center">{{ $item->created_at->diffForHumans() }}</td>

                <td class="text-center">{{ $item->deleted_at->diffForHumans() }}</td>

                <td class="text-center">
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
<script>
  $(document).ready( function () {
  $('#chapterTable').DataTable();
} );

  function deleteChapter(e, novel_id) {
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
          '{{ session('deletePermanent') }}',
          'success'
        )
      }
    })

  }  
</script>
@endsection


{{-- RPLLab3jaya --}}