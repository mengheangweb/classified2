@extends('layout.main')
@section('content')


    <h1 class="my-5">My Ads</h1>


    <div class="row">

        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
        
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <img class="img-thumbnail" width="100px"
                            @if($post->image)
                            src="{{asset('storage/'.$post->image)}}" class="w-100 img-fluid"
                            @else
                            src="/assets/images.jpeg" class="w-100"
                            @endif
                        />
                        </td>
                        <td>{{ $post->price }}</td>
                        <td>{{ $post->category? $post->category->name : 'N/A' }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="/listing/{{ $post->id }}" target="_blank">Preview</a>
                            <a class="btn btn-info btn-sm" href="/listing/edit/{{ $post->id }}">Edit</a>
                            <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="/listing/delete/{{ $post->id }}">Delete</a>
                        </td>
                    </tr>
        
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mb-4">
                {!! $posts->links() !!}
              </div>
              
        </div>
        <div class="col-md-4">
            <h3>Trash</h3>

            @if($soft_deleted->count())
                <ul>
                    @foreach($soft_deleted as $delete)

                        <li>
                            {{ $delete->title }} 
                            <small>deleted at: {{ $delete->deleted_at }}</small>
                            <a href="/listing/restore/{{ $delete->id }}">Restore</a>
                            <a class="text-danger" onclick="return confirm('Are you sure you want to forever delete this?') " href="/listing/empty/{{ $delete->id }}">Delete</a>
                        </li>

                    @endforeach
                </ul>
            @else 

                <h5>No Records</h5>

            @endif
        </div>

    </div>
    
@endsection
