@extends('main.dashboardMain')

@section('dashboard')
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $title }}</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/dashboard/chapter-controller/add" class="btn btn-sm btn-outline-secondary px-3 py-2 fw-bold">
          <i class="bi bi-file-earmark-plus fs-5"></i> Create New List Manga
        </a>
      </div>
    </div>

    {{-- Table Data Novel --}}
    <div class="d-flex justify-content-end me-5">
      {{-- <span>{{ $chapter->links() }}</span> --}}
    </div>
    <div class="table-responsive">
      <table class="table align-middle">
          <thead class="text-center">
            <tr>
             
              <th scope="col">No</th>
              
              <th scope="col">Action</th>

              <th scope="col">Name</th>

              <th scope="col">Chapter</th>
              
              <th scope="col">Status</th>

              <th scope="col">Created At</th>
              
              <th scope="col">Novel</th>
              
            </tr>
          </thead>
          <tbody class="text-center">
            

          </tbody>
        </table>    
    </div>

    

  </main>

@endsection


@section('delete')
  function deleteChapter(e, chapter_id) {
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
        document.location.href = '/delete-chapter/' + chapter_id;
        Swal.fire(
          'Deleted!',
          'Your Data has been deleted.',
          'success'
        )
      }
    })

  }  
@endsection


{{-- 
  
  



  --}}
