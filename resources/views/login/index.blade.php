@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-5 mb-5">
    <div class="col-md-3">

        <main class="form-signin">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger" role="alert">
                    {{ session('loginError') }}
                </div>
            @endif

            <h1 class="h3 mb-3 fw-normal text-center">Silahkan Login</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required value="{{ old('username') }}"">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <!--<button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                <button class="w-100 btn btn-lg" type="submit" style="background-color: #04988F;">Login</button>-->
                <button class="w-100 btn btn-lg" type="submit" style="background-color: #04988F; color: white;">Login</button>
            </form>
             <!--<small class="d-block text-center mt-3">Belum Mendaftar Akun? <a href="/register">Daftar Sekarang!</a></small>-->
            <small class="d-block text-center mt-3" style="color: black;">Belum Mendaftar Akun? <a href="/register" style="color: #04988F;">Daftar Sekarang!</a></small>
        </main>
    </div>
</div>

@endsection