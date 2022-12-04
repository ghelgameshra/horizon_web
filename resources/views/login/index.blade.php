@extends('layouts.main')

@section('container')


</style>

<div class="row justify-content-center" style="margin-top: 100px">
    <div class="col-md-4">
        <main class="form-signin w-100 m-auto">
            <form>
                <img class="mb-4 mx-auto d-block" src="{{ asset('/images/horizon-logo.png') }} " alt="horizon-logo" width="200">
            
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-dark" type="submit">Login</button>
            </form>
        </main>
    </div>
</div>


@endsection