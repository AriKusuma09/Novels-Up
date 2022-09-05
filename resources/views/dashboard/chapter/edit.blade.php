@extends('main.dashboardMain')

@section('dashboard')
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <form action="{{ url('update-chapter/'.$chapter->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="submit" class="btn btn-sm btn-outline-secondary px-3 py-2 fw-bold">
                <i class="bi bi-file-earmark-plus fs-5"></i> Update List Chapter
            </button>
        </div>
        </div>

    
    
    {{-- Form Edit List Chapter --}}
        <div class="container mt-5">
            <div class="d-flex justify-content-between">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" style="width: 500px;" id="name" name="name" placeholder="Enter Novel Name..." value="{{ old('name', $chapter->name) }}">
                    @error('name')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" style="width: 500px;" id="slug" name="slug" placeholder="Enter Slug Chapter..." value="{{ old('slug', $chapter->slug) }}">
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
                        <input class="form-check-input checkbox" type="checkbox" name="status" {{ $chapter->status == "1" ? 'checked':'' }}>
                        <label class="form-check-label label-check" for="">
                        Active
                        </label>
                    </div>
                    <select class="form-select" disabled aria-label="Default select example" style="width: 380px;">
                        <option value="">{{ $chapter->novel->name }}</option>
                        
                      </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control @error('chapter') is-invalid @enderror" style="width: 500px;" id="chapter" name="chapter" placeholder="Enter Chapter Novel..." value="{{ old('chapter', $chapter->chapter ) }}">
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
                    @if ($chapter->image)
                        <img src="{{ asset('assets/uploads/chapter/'.$chapter->image) }}" alt="Novel Cover" class="img-preview mt-4" style="width: 270px; height: 380px; margin-right: 100px;">
                    @endif
                    @error('image')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
            </div>   
            <div class="form-floating mt-5 mb-5">
                <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px; resize: none;" name="text">{{ old('text', $chapter->text ) }}</textarea>
                @error('text')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
				@enderror
                {{-- <input id="text" type="hidden" name="text" value="{{ old('text', $chapter->text) }}">
                <trix-editor input="text"></trix-editor> --}}
            </div>

             
        </div>    
        

    </form>


  </main>


@endsection 