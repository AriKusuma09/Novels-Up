@extends('main.main')

@section('main')

    <div class="container mt-5">
        <div class="text-center">
            <h1 class="title-profile">My Profile</h1>    
        </div>    
    
        <form action="{{ url('update-profile') }}" method="POST" class="my-5 mx-5 form-profile">
            @csrf
            @method('put')
            <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', Auth::user()->username) }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email', Auth::user()->email) }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="d-flex justify-content-end">
                <input type="submit" class="btn btn-outline-primary" value="Ubah">
            </div>
      </form>
    </div>

@endsection