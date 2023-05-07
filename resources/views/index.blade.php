@extends('layouts.adminPanel.master')

@section('title','Posts List')

@section('content')

<div class="container mt-5">

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @if(Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('status')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <h2>Posts List
                <a href="{{url('/post')}}" class="btn btn-sm btn-primary float-end">Create</a>
            </h2>

            <table class="table table-striped mt-5">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach($posts as $post)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$post->title}}</td>
                    <td>
                        <img src="/images/{{$post->image}}" class="img-fluid img-thumbnail w-25 h-25" alt="">
                    </td>
                    <td>{{$post->category}}</td>
                    <td>{{$post->description}}</td>
                    <td>
                        <a href='{{url("posts/$post->id")}}' class="btn btn-primary btn-sm ">Edit</a>|
                        <a href='{{url("posts/$post->id/delete")}}' class="btn btn-danger btn-sm">Delete</a>

                    </td>

                  </tr>
                  @endforeach

                </tbody>
              </table>



        </div>
    </div>
    </div>
@endsection
