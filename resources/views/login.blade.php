@extends('template')

@section('content')

    {{-- <div class="page-header">
        <h1>Login Page</h1>
    </div> --}}
    
    <form METHOD="post" action="/login">
        {{csrf_field()}}
        {{-- <div class="container rounded bg-white form-container w-100">
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
        </div> --}}
        <div class="container py-5 h-100">
            <div class="row d-flex mt-5 justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-white login-container" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                    <div class="mb-md-2 mt-md-4 pb-5">
                        <h2 class="fw-bold mb-5">Login to DiscussIt</h2>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label input-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="example@mail.com" />
                        </div>
        
                        <div class="form-outline form-white mb-4">
                            <label class="form-label input-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                        </div>
                        
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                    </div>
        
                    <div>
                        <p class="mb-0">Don't have an account? <a href="/register" class="text-white-50 fw-bolder">Register</a>
                        </p>
                    </div>
        
                    </div>
                </div>
                </div>
            </div>
        </div> 
    </form>
    
    
    @foreach($errors->all() as $e)
        <div class="alert alert-warning">
            <p class="text-danger">{{$e}}</p>
        </div>
    @endforeach
    
@endsection
