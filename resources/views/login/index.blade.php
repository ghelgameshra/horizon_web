@extends('layouts.main')

@section('container')


</style>

<div class="row justify-content-center" style="margin-top: 100px">
    <div class="col-md-4">

        
        <main class="form-signin w-100 m-auto">
            <form action="/login" method="POST">
                @csrf
                <img class="mb-4 mx-auto d-block" src="{{ asset('/images/horizon-logo.png') }} " alt="horizon-logo" width="200">
                
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" autofocus required value="{{ old('username')}} ">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-dark" type="submit">Login</button>
            </form>
        </main>
    </div>
</div>


@endsection