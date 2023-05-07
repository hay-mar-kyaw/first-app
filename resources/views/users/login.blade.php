@extends('layouts.adminPanel.login')

@section('title','Login')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                @if(Session::has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('status')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>


                @endif
                <h2>Login</h2>
                <form action="{{url('login')}}" method="post" class="mt-3">
                    <input type="hidden" value={{csrf_token()}} name="_token">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@gmail.com">
                        @error('email')
                            <small class="text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="********">
                        @error('password')
                            <small class="text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>

                </form>
            </div>
        </div>

    </div>

@endsection
