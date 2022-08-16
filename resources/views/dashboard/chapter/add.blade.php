@extends('main.dashboardMain')

@section('dashboard')
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <form action="{{ url('insert-chapter') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="submit" class="btn btn-sm btn-outline-secondary px-3 py-2 fw-bold">
                <i class="bi bi-file-earmark-plus fs-5"></i> Post New List Chapter
            </button>
        </div>
        </div>

    
    
    {{-- Form Add List Chapter --}}
        <div class="container mt-5">
            <div class="d-flex justify-content-between">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" style="width: 500px;" id="name" name="name" placeholder="Enter Novel Name..." value="{{ old('name') }}">
                    @error('name')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" style="width: 500px;" id="slug" name="slug" placeholder="Enter Slug Chapter..." value="{{ old('slug') }}">
                    @error('slug')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <div class="check d-flex mt-1">
                    <div class="form-check mx-4" style="margin-top: 12px">
                        <input class="form-check-input checkbox" type="checkbox" name="status">
                        <label class="form-check-label label-check" for="">
                        Active
                        </label>
                    </div>
                    <select class="form-select" name="nov_id" aria-label="Default select example" style="width: 380px;">
                        <option value="">Select Novel</option>
                        @foreach ($novel as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control @error('chapter') is-invalid @enderror" style="width: 500px;" id="chapter" name="chapter" placeholder="Enter Chapter Novel..." value="{{ old('chapter') }}">
                    @error('chapter')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
            </div>
            <div class="d-flex justify-content-between mb-5">
                <div class="mb-3">
                    <label for="image" class="form-label">Cover Novel</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" style="width: 500px" id="image" name="image" onchange="previewImage()">
                </div>
                <div class="mb-3">
                    <img class="img-preview mt-4" style="width: 270px; height: 380px; margin-right: 100px;">
                    @error('image')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
            </div>   
            <div class="form-floating mt-5 mb-5">
                {{-- <textarea class="form-control @error('text') is-invalid @enderror" placeholder="Enter Novel Text..." id="floatingTextarea2" style="height: 1200px;" name="text" id="text">{{ old('text') }}</textarea>
                <label for="floatingTextarea2">Enter Novel Text...</label>
                @error('text')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
				@enderror --}}
                <input id="text" type="hidden" name="text" class="@error('text') is-invalid @enderror">
                <trix-editor input="text"></trix-editor>
                @error('text')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
				@enderror
            </div>

             
        </div>    
        

    </form>


  </main>


@endsection 