@extends('layouts/authLayout')
@section('title','Login')
@section('contents')
<div class="text-center pb-2"><h2>Login</h2></div>

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
    {{ Session::get('error') }}
    </div>
@endif
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="m-2 float-left">
        <label for="email" class="form-label fs-5">Email</label>
        <input type="email" id="email" name="email" class="form-control" aria-describedby="email">
    </div>
    <div class="m-2 mb-3">
        <label for="password" class="form-label fs-5">Password</label>
        <input type="password" id="password" name="password" class="form-control" aria-describedby="password">
    </div>
    <div class="text-center">
        <button class="btn btn-success">Login</button>
        <p class="mt-2"><a href="{{ route('register') }}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Register</a></p>
    </div>
</form>
@endsection