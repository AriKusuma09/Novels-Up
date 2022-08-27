@extends('main.dashboardMain')

@section('dashboard')
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <form action="{{ url('update-novel/'.$novel->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="submit" class="btn btn-sm btn-outline-secondary px-3 py-2 fw-bold">
                <i class="bi bi-file-earmark-plus fs-5"></i> Update List Novel
            </button>
        </div>
        </div>

    
    
    {{-- Form Add List Novel --}}
        <div class="container mt-5">
            <div class="d-flex justify-content-between">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name', $novel->name ) }}" type="text" class="form-control @error('name') is-invalid @enderror" style="width: 500px;" id="name" name="name" placeholder="Enter Novel Name...">
                    @error('name')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
                <div class="mb-3">
                    <label for="alternative" class="form-label">Alternative Name</label>
                    <input value="{{ old('alternative', $novel->alternative ) }}" type="text" class="form-control @error('alternative') is-invalid @enderror" style="width: 500px;" id="alternative" name="alternative" placeholder="Enter Alternative Novel Name...">
                    @error('alternative')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input value="{{ old('slug', $novel->slug ) }}" type="text" class="form-control @error('slug') is-invalid @enderror" style="width: 500px;" id="slug" name="slug" placeholder="Enter Slug Novel...">
                    @error('slug')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input value="{{ old('genre', $novel->genre ) }}" type="text" class="form-control @error('genre') is-invalid @enderror" style="width: 500px;" id="genre" name="genre" placeholder="Enter Genre Novel...">
                    @error('genre')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
            </div>
            <div class="form-floating mt-4">
                {{-- <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px; resize: none;" name="description" id="description">{{ old('description', $novel->description) }}</textarea>
                <label for="floatingTextarea2">Enter Description Novel...</label>
                @error('description')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror --}}
                <input id="description" type="hidden" name="description" value="{{ old('description', $novel->description ) }}">
                <trix-editor input="description"></trix-editor>
            </div>
            <div class="d-flex justify-content-between mt-5">
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input value="{{ old('country', $novel->country ) }}" type="text" class="form-control @error('country') is-invalid @enderror" style="width: 500px;" id="country" name="country" placeholder="Enter Country Novel From...">
                    @error('country')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
                <div class="mb-3">
                    <label for="published" class="form-label">Published</label>
                    <input value="{{ old('published', $novel->published ) }}" type="text" class="form-control @error('published') is-invalid @enderror" style="width: 500px;" id="published" name="published" placeholder="Enter Year Novel Published...">
                    @error('published')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input value="{{ old('author', $novel->author ) }}" type="text" class="form-control @error('author') is-invalid @enderror" style="width: 500px;" id="author" name="author" placeholder="Enter Author Novel...">
                    @error('author')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
                <div class="mb-3">
                    <label for="total_chap" class="form-label">Total Chapter</label>
                    <input value="{{ old('total_chap', $novel->total_chap ) }}" type="text" class="form-control @error('total_chap') is-invalid @enderror" style="width: 500px;" id="total_chap" name="total_chap" placeholder="Enter Total Chapter Novel...">
                    @error('total_chap')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <div class="check d-flex mt-1   ">
                    <div class="form-check mx-4">
                        <input class="form-check-input checkbox" type="checkbox" {{ $novel->condition == "1" ? 'checked':'' }} name="condition">
                        <label class="form-check-label label-check" for="">
                        On Going
                        </label>
                    </div>
                    <div class="form-check mx-4">
                        <input class="form-check-input checkbox" type="checkbox" {{ $novel->status == "1" ? 'checked':'' }} name="status">
                        <label class="form-check-label label-check" for="">
                        Active
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input value="{{ old('type', $novel->type ) }}" type="text" class="form-control @error('type') is-invalid @enderror" style="width: 500px;" id="type" name="type" placeholder="Enter Type Novel...">
                    @error('type')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
            </div>
            <div class="d-flex justify-content-between mb-5">
                <div class="mb-3">
                    <label for="image" class="form-label">Cover Novel</label>
                    <input type="file" class="form-control @error('email') is-invalid @enderror" style="width: 500px" id="image" name="image" onchange="previewImage()">
                </div>
                <div class="mb-3">
                    @if ($novel->image)
                        <img class="img-preview" src="{{ asset('assets/uploads/novel/'.$novel->image) }}" alt="Novel Cover" style="width: 270px; height: 380px; margin-right: 100px;">
                    @endif
                    @error('image')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                </div>
            </div>    
        </div>    
        

    </form>


  </main>


@endsection 