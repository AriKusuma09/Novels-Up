@extends('main.login-register')

@section('login-register')
    

    

    <section class="background-body">
        {{-- <div class="toggle-dark d-none">
            <span class="icon dark-theme-icon fs-4 me-5 toggle-dark-mode" onclick="setDarkMode()" id="darkButton"><i class="bi bi-moon-fill"></i></span>
        </div> --}}
        
        @if (session()->has('status'))
            <div class="alert-regis">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class=""><i class="bi bi-exclamation-circle-fill me-2"></i></strong>
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <div class="container">
            <div class="form-body">

                <form action="/login" method="POST">
                    @csrf
                    <div class="title-form text-center">
                        <h1>Login <span>Novels Up</span></h2>
                    </div>
                    <div class="email-form mb-4">
                        <label for="email" class="label-form">Email</label><br>
                        <input type="text" name="email" id="email" class="email @error('email') is-invalid @enderror" autocomplete="off" value="{{ old('email') }}" autofocus required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="password-form mt-4">
                        <label for="password" class="label-form">Password</label><br>
                        <input type="password" name="password" id="password" class="password" autocomplete="off" required>
                    </div>
                    <div class="text-bottom">
                        <span class="make-text">Belum Memiliki Akun? <a href="/register">Buat Akun!</a></span>
                    </div>
                    <div class="button-submit text-center pt-5">
                        <input type="submit" class="btn-login" value="Login">
                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection
