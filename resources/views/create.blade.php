@extends('layouts.adminPanel.master')

@section('title','Create Post')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Create New Post</h2>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if(Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

                <form action="{{url('post')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value={{csrf_token()}}>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="name" name="title" placeholder="Enter Post title">
                        @error('title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="file" name="image" class="form-control" id="image">
                        @error('image')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control mt-3" id="category" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>


                    <div class="mt-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
