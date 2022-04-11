@extends('template')

@section('content')

    <div class="page-header">
        <h1>Login Page</h1>
    </div>
    <form METHOD="post" class="form_1" action="/login" style="margin: 5% 5% 5% 5%">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="email" class="form-label white-text">Email</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text disabled-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label white-text">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label white-text" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn my-button">LOGIN</button>
    </form>
    @foreach($errors->all() as $e)
        <div class="alert alert-warning">
            <p class="text-danger">{{$e}}</p>
        </div>
    @endforeach
    
@endsection
