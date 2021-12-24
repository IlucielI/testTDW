@extends('layouts/auth')

@section('form')
<form class="form-signin" action="/register" method="POST">
  @csrf
  <img class="mb-4" src="logo.webp" alt="" width="100%" height="100%">
  <h1 class="h3 mb-3 font-weight-normal">Please {{$title}}</h1>
  <label for="inputName" class="sr-only">Nama</label>
  <input type="text" id="inputName" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" required autofocus value="{{ old('name')}}">
  @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
  @enderror
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required value="{{ old('email')}}">
   @error('email')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
  @enderror
  <label for="inputPhone" class="sr-only">Nomor Telepon</label>
  <input type="number" id="inputPhone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Nomor Telepon" required value="{{ old('phone')}}">
   @error('phone')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
  @enderror
  <label for="inputRole" class="sr-only">Role</label>
  <select class="form-select form-control" required name="role">
    <option value="">--Select Role--</option>
    <option value="admin" @if (old('role') == 'admin') selected="selected" @endif>Admin</option>
    <option value="member" @if (old('role') == 'member') selected="selected" @endif>Member</option>
  </select>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
  @error('password')
   <div class="invalid-feedback">
       {{ $message }}
   </div>
 @enderror
  <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
  <a href="/login" class="w-100 d-flex justify-content-center" style="text-decoration: none;">
      <button class="btn btn-lg btn-success btn-block w-50 mt-2" type="button" style="font-size: 1rem">Login</button>
  </a>
</form>

@endsection
