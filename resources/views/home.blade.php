@extends('layout.main')

@section('content')


<hello-world/>


<!-- Jumbotron -->
<div class="p-4 shadow-4 rounded-3 mt-4 jumbotron">
  <h2>{{ __('home.welcome') }}</h2>
  <p>
    This is a simple hero unit, a simple jumbotron-style component for calling extra
    attention to featured content or information.
  </p>

  <hr class="my-4" />

  <p>
    It uses utility classes for typography and spacing to space content out within the
    larger container.
  </p>
  <a href="/post/create" class="btn btn-primary">{{ __('home.create_post') }}</a>
</div>
  <!-- Jumbotron -->


<h2 class="my-4">Lastest Ads...</h2>
<div class="my-4 row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 flex justify-content-around">
  @foreach ($posts as $post)
  <div class="card" style="width: 18rem; margin: 1rem; padding: 0;">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
      <img src="/assets/images.jpeg" class="w-100"/>
      <a href="#!">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">{{$post->description}}</p>
      <p class="card-text">{{$post->price}}</p>
      <a href="#" class="btn btn-primary">View Detail</a>
    </div>
  </div>
  @endforeach
</div>
<div class="text-center">
  <a href="/post" class="btn btn-info col-sm-2 mb-5">View more...</a>
</div>

@endsection