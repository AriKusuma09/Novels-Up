@extends('main.login-register')

@section('login-register')
    
    
    <section class="background-body">
        <div class="toggle-dark d-none">
            <span class="icon dark-theme-icon fs-4 me-5 toggle-dark-mode" onclick="setDarkMode()" id="darkButton"><i class="bi bi-moon-fill"></i></span>
        </div>
        
        <div class="container">
            <div class="form-body">

                <form action="/register" method="POST">
                    @csrf       

                    <div class="title-form text-center">
                        <h1>Register <span>Novels Up</span></h2>
                    </div>
                    <div class="name-form mb-4">
                        <label for="name" class="label-form">Name</label><br>
                        <input type="text" name="name" class="form-control name @error('name') is-invalid @enderror" autocomplete="off" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="username-form mb-4">
                        <label for="username" class="label-form">Username</label><br>
                        <input type="text" name="username" class="username @error('username') is-invalid @enderror" autocomplete="off" value="{{ old('username') }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="email-form mb-4">
                        <label for="email" class="label-form">Email</label><br>
                        <input type="text" name="email" class="email @error('email') is-invalid @enderror" autocomplete="off" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="password-form mt-4">
                        <label for="password" class="label-form">Password</label><br>
                        <input type="password" name="password" class="password @error('password') is-invalid @enderror" autocomplete="off">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-bottom">
                        <span class="make-text">Sudah Memiliki Akun? <a href="/login">Masuk!</a></span>
                    </div>
                    <div class="button-submit text-center pt-5">
                        <input type="submit" class="btn-login" value="Register">
                    </div>

                </form>

            </div>
        </div>

    </section>


@endsection