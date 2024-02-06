@extends('layouts.authLayout')
@section('title','Register')
@section('contents')
<div class="text-center pb-2"><h2>Register</h2></div>
<form action="{{ route('register') }}" method="POST">
    @csrf
    
    <div class="m-2 float-left">
        <label for="email" class="form-label fs-5">Email</label>
        <input type="email" id="email" name="email" class="form-control @error('email')is-invalid @enderror" value="{{ old('email') }}" required>
        @error('email')
            <div class="text-danger">This email already exists.</div>
        @enderror
    </div>
    <div class="m-2 mb-3">
        <label for="password" class="form-label fs-5">Password</label>
        <input type="password" id="password" name="password" class="form-control @error('password')is-invalid @enderror" required>
        @error('password')
            <div class="text-danger">password not match.</div>
        @enderror
    </div>
    <div class="m-2 mb-3">
        <label for="password_confirmation" class="form-label fs-5">Password Confirmation</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation')is-invalid @enderror" required>
    </div>
    <div class="m-2 mb-3">
        <label for="firstname" class="form-label fs-5">Firstname</label>
        <input type="text" id="firstname" name="firstname" class="form-control @error('firstname')is-invalid @enderror" value="{{ old('firstname') }}" >
        @error('firstname')
            <div class="text-danger">firstname is required.</div>
        @enderror
    </div>
    <div class="m-2 mb-3">
        <label for="lastname" class="form-label fs-5">Lastname</label>
        <input type="text" id="lastname" name="lastname" class="form-control @error('lastname')is-invalid @enderror" value="{{ old('lastname') }}" >
        @error('lastname')
            <div class="text-danger">lastname is required.</div>
        @enderror
    </div>
    
    <div class="text-center">
        <button class="btn btn-success">Register</button>
    </div>
</form>
@endsection