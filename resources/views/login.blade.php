@extends('template')

@section('content')

    <div class="page-header">
        <h1>Login Page</h1>
    </div>
    
    <form METHOD="post" class="form-new rounded-border" action="/login" style="margin: 1% 30% 0% 30%; padding-bottom: 1%" >
        {{csrf_field()}}
        <div class="container rounded bg-white form-container w-100">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text disabled-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <div class="mt-5 mb-3 text-center">
                <button class="btn btn-primary profile-button" type="submit" style="width: 30%; font-size: large">
                    Login
                </button>
            </div>
        </div>
    </form>
    
    
    @foreach($errors->all() as $e)
        <div class="alert alert-warning">
            <p class="text-danger">{{$e}}</p>
        </div>
    @endforeach
    
@endsection
