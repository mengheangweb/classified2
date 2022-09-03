@if (session()->has('message'))
<div class="alert alert-success m-3" role="alert">
    {{session()->get('message')}}
  </div>
@endif


@if (session()->has('error'))
<div class="alert alert-danger m-3" role="alert">
    {{session()->get('error')}}
  </div>
@endif