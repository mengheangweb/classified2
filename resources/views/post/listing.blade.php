@extends('layout.main')
@section('content')
<h2 class="my-4">All Ads</h2>

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="/listing">Reset</a>
    @foreach($categories as $category)

      <a class="btn btn-info" href="/listing?c={{ $category->id }}">{{ $category->name }} ({{ $category->post->count()}})</a>

    @endforeach
  </div>
</div>

<div class="my-4 row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 flex justify-content-around">
  @foreach ($posts as $post)
  <div class="card" style="width: 18rem; margin: 1rem; padding: 0;">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
      <img 
        @if($post->image)
        src="{{asset('storage/'.$post->image)}}" class="w-100"
        @else
        src="/assets/images.jpeg" class="w-100"
        @endif
      />
      <a href="#!">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <small class="badge bg-danger">{{ $post->category? $post->category->name : '' }}</small>
      <p class="card-text">{{$post->price}}</p>
      <a href="/listing/{{ $post->id }}" class="btn btn-primary">View Detail</a>
    </div>
  </div>
  @endforeach
</div>
<div class="d-flex justify-content-center mb-4">
  {!! $posts->links() !!}
</div>

@endsection