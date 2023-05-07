@extends('layouts.adminPanel.master')

@section('title','Categories List')

@section('content')

<div class="container mt-5">


    <div class="row">

        <div class="col-md-8 offset-md-2">
            <h2>Categories List
                <a href="{{url('/category')}}" class="btn btn-sm btn-primary float-end">Create</a>
            </h2>
            <table class="table mt-5">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach($categories as $category)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href='{{url("categories/$category->id")}}' class="btn btn-primary btn-sm ">Edit</a>|
                        <a href='{{url("categories/$category->id/delete")}}' class="btn btn-danger btn-sm">Delete</a>

                    </td>

                  </tr>
                  @endforeach

                </tbody>
              </table>



        </div>
    </div>
    </div>
@endsection
