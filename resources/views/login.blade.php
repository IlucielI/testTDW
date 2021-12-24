@extends('layouts/auth')

@section('form')
<form class="form-signin" action="/login" method="POST">
  @csrf
  <img class="mb-4" src="logo.webp" alt="" width="100%" height="100%">
  <h1 class="h3 mb-3 font-weight-normal">Please {{$title}}</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required autofocus value="{{ old('email')}}">
   @error('email')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
  @enderror
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  <a href="/register" class="w-100 d-flex justify-content-center" style="text-decoration: none;">
      <button class="btn btn-lg btn-success btn-block w-50 mt-2" type="button" style="font-size: 1rem">Register</button>
  </a>
</form>

@endsection
