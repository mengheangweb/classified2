@extends('layout.main')
@section('content')

<h1 class="mt-5">Login</h1>

<div class="row">
  <div class="col-md-4">

  <form action="/login" method="post">

    @csrf

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input name="email" value="mengheangweb@gmail.com" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input name="password" value="12345678" type="password" class="form-control" id="exampleInputPassword1">
    </div>
  
    <button type="submit" class="btn btn-primary mb-5">Login</button>
    <br/>

    <a href="/register" class="mt-5">Not yet have account? Register here</a>
  </form>
  </div>
  <div class="col-md-8">
  </div>
</div>
@endsection
