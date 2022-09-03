@extends('layout.main')
@section('content')

    <h3 class="mt-5">{{ $post->title }}</h3>
    <span class="badge bg-danger">{{ $post->category->name }}</span>

    <div class="row mt-5">
        <div class="col-md-7">
            {!! $post->description !!}

            <div class="my-5">

                @foreach($post->tag as $tag)

                <span class="badge bg-success">{{ $tag->title }}</span>

                @endforeach
            </div>
        </div>
        <div class="col-md-5">
            <img 
                @if($post->image)
                src="{{asset('storage/'.$post->image)}}" class="w-100 img-fluid"
                @else
                src="/assets/images.jpeg" class="w-100"
                @endif
            />

            @if($post->user)

                <h5 class="mt-5">Posted By:</h5>
                <p>{{ $post->user->name }}</p>
                <p>{{ $post->user->email }}</p>

            @endif
        </div>
    </div>

    <h3>Similar Ads</h3>
    <div class="row">
    @foreach ($similars as $post)
  
        <div class="col-md-3">
            <div class="card">
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
        </div>
    @endforeach
</div>


@endsection
