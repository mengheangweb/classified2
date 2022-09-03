@extends('layout.main')
@section('content')

<h1 class="mt-5">Register</h1>

<div class="row">
  <div class="col-md-4"> 

  <form dusk="register-form" action="/register" method="post">

    @csrf

    <div class="mb-3">
        <label for="exampleInputName" class="form-label">Name</label>
        <input name="name" type="text" value="Mengheang" class="form-control" id="exampleInputName" aria-describedby="emailName">
    </div>


    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input name="email" value="mengheangweb@gmail.com" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input name="password" value="12345678" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Re-Type Password</label>
      <input name="password_confirmation" value="12345678" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
  <div class="col-md-8">
  </div>
</div>
@endsection
