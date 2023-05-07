@extends('layouts.adminPanel.master')

@section('title','Users List')

@section('content')

<div class="container mt-5">


    <div class="row">

        <div class="col-md-8 offset-md-2">
            <h2>Users List</h2>
            <table class="table mt-5">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>


                  </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach($users as $user)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    

                  </tr>
                  @endforeach

                </tbody>
              </table>



        </div>
    </div>
    </div>
@endsection
