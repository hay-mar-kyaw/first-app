@extends('layouts.adminPanel.master')

@section('title','Edit Post')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Edit Post</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action='{{url("posts/$post->id")}}' method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value={{csrf_token()}}>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="name" name="title" value={{$post->title}}>
                        @error('title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label for="image">Image</label>
                            <input type="file" name="image" id="image">
                            @if($post->image)
                                <img src="{{ asset('images/' . $post->image) }}" class="img-fluid w-25" alt="Item Image">
                            @endif

                        @error('image')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control mt-3" id="category" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $post->category ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>


                    <div class="mt-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="summernote" rows="3">{{$post->description}}</textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
