@extends('layout.main')
@section('content')
<div>
  <h1 class="mt-5 text-center">Create new post</h1>
  @if($errors->any())
  <div class="alert alert-danger d-flex align-content-center justify-content-center  col-md-6" role="alert">
    {{-- <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> --}}
    <div>
      Please Enter Infomation Following Policy.
    </div>
  </div>
  @endif
<div class="row my-5 justify-content-center ">
    <div class="col-md-6 flex">
        <form action="/store/post" enctype="multipart/form-data" method="post">
            @csrf
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select name="category" class="@if($errors->has('category')) is-invalid @endif  form-control">
                <option value="">Choose</option>
                @foreach($categories as $category)
                  <option @selected(old('category') == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
              @if ($errors->has('category'))
                <div class="invalid-feedback">
                    {{$errors->first('category')}}
                </div>
              @endif
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input name="title" value="{{ old('title') }}" type="text" class="@if($errors->has('title')) is-invalid @endif  form-control" id="title" aria-describedby="title">
              @if ($errors->has('title'))
                <div class="invalid-feedback">
                    {{$errors->first('title')}}
                </div>
              @endif
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input name="price" value="{{ old('price') }}" type="number" class="@if($errors->has('price')) is-invalid @endif  form-control" id="price">
            @if ($errors->has('price'))
                <div class="invalid-feedback">
                    {{$errors->first('price')}}
                </div>
              @endif
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input name="image" type="file" class="@if($errors->has('image')) is-invalid @endif form-control" id="image">
              @if ($errors->has('image'))
                <div class="invalid-feedback">
                    {{$errors->first('image')}}
                </div>
              @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="summernote" name="description" class="form-control @if($errors->has('description')) is-invalid @endif">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <div class="invalid-feedback">
                    {{$errors->first('description')}}
                </div>
              @endif
            </div>
            <div class="mb-3">
              @foreach($tags as $tag)

                <input   name="tag[]" value="{{ $tag->id }}" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">{{ $tag->title }}</label>

              @endforeach
              @if ($errors->has('tag'))
                <div class="invalid-feedback">
                    {{$errors->first('tag')}}
                </div>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

</div>

@endsection

@push('scripts')

<script>
  $(document).ready(function() {
    $('#summernote').summernote();
  });
</script>
    
@endpush


