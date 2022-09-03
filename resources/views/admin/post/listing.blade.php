@extends('admin.layout.master')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Post</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->price }}</td>
                    <td>
                        <img class="img-thumbnail" width="100px"
                            @if($post->image)
                            src="{{asset('storage/'.$post->image)}}" class="w-100 img-fluid"
                            @else
                            src="/assets/images.jpeg" class="w-100"
                            @endif
                        />
                    </td>
                    <td>
                      <a href="/admin/listing/response/approved?id={{ $post->id }}" class="btn btn-sm btn-info mr-2">Approve</a> 
                      <a href="/admin/listing/response/rejected?id={{ $post->id }}" class="btn btn-sm btn-danger">Reject</a>
                    </td>
                </tr>
          @endforeach
        </tbody>
      </table>




@endsection