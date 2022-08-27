@extends('main.dashboardMain')

@section('dashboard')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          {{-- <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div> --}}
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>

      <div class="box-dashboard d-flex justify-content-center mx-3">
        <div class="box mx-3 my-3 text-center">
          <h5 class="text-center"><span class="fw-bold">{{ $userCount }}</span> <span>User Registration</span></h5>
          <img class="" src="/assets/img/icon/user.png" alt="User Registration" width="200" height="100">
        </div>
        <div class="box mx-3 my-3 text-center">
          <h5 class="text-center"><span class="fw-bold">{{ $novelCount }}</span> <span>Novel Uploaded</span></h5>
          <img class="" src="/assets/img/icon/novel.png" alt="User Registration" width="100" height="100">
        </div>
        <div class="box mx-3 my-3 text-center">
          <h5 class="text-center"><span class="fw-bold">{{ $chapterNovelCount }}</span> <span>Chapter Novel Uploaded</span></h5>
          <img class="" src="/assets/img/icon/chapter.png" alt="User Registration" width="100" height="100">
        </div>
      </div>

      <canvas class="mt-5 mb-5" id="graph" style="width:100vw;height:33rem;"></canvas>

      <h2>What's New ?</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr class="text-center">
              <th scope="col">No.</th>
              <th scope="col">Title</th>
              <th scope="col">Type</th>
              <th scope="col">Created At</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($new as $item)
            <tr>
              <td class="text-center fw-bold">{{ $loop->iteration }}</td>
              <td>{{ $item->name }}</td>
              <td class="text-center">{{ $item->novel->type }}</td>
              <td class="text-center">{{ $item->created_at->format('d M Y') }}</td>
              <td class="text-center">
                @if ($item->novel->condition == '1')
                <b class="text-primary">On Going</b>
                  @elseif ($item->novel->condition == '0')
                  <b class="text-success">Finished</b>
                @endif
              </td>
            </tr>
            
            @endforeach

          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

@endsection
    
