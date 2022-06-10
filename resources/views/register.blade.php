@extends('template')

@section('content')
    <form method="POST" action="{{route('registerValidate')}}" style="margin: 0 5% 1% 5%" enctype="multipart/form-data">
        {{csrf_field()}}
        {{-- <div class="row">
            <div class="mb-3  col-md-6">
                <label for="name" class="white-text">Name</label>
                <input type="text" class="form-control" name="name" placeholder="John Doe">
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="white-text">Email</label>
                <input type="email" class="form-control" name="email" placeholder="johndoe@mail.com">
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="white-text">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="white-text">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
            <label class="form-check-label white-text" for="male">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
            <label class="form-check-label white-text" for="female">
                Female
            </label>
        </div> --}}
        <div class="container py-5 h-100">
            <div class="row d-flex mt-5 justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white login-container" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <div class="mb-md-2 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-5">Join us now</h2>

                                <div class="form-outline form-white mb-4 text-center">
                                    <label class="form-label input-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="example@mail.com" />
                                </div>
                
                                <div class="form-outline form-white mb-4 text-center">
                                    <label class="form-label input-label" for="email">Name</label>
                                    <input type="name" id="name" name="name" class="form-control form-control-lg" placeholder="John Doe" />
                                </div>

                                <div class="form-outline form-white mb-4 text-center">
                                    <label class="form-label input-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                                </div>

                                <div class="form-outline form-white mb-4 text-center">
                                    <label class="form-label input-label" for="password">Confirm Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Confirm Password" />
                                </div>

                                <div class="text-center">
                                    <label class="form-label input-label">Gender</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                    <label class="form-check-label white-text" for="male">
                                        Male
                                    </label>
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                    <label class="form-check-label white-text" for="female">
                                        Female
                                    </label>
                                </div>

                                <div class="text-center mt-3">
                                    <button class="btn btn-outline-light btn-lg px-5 " type="submit">Register</button>
                                </div>
                            </div>
                
                            <div>
                                <p class="mb-0">Already have an account? 
                                    <a href="/login" class="text-white-50 fw-bolder">Login</a>
                                </p>
                            </div>
                
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="mb-3">
            <button type="submit" class="btn my-button">REGISTER</button>
        </div>
        <small class="form-text text-muted link disabled-text">Already have an account? 
            <a class="link-info" href="/register">Login here.</a>
        </small> --}}
        
        @foreach($errors->all() as $e)
            <div class="alert alert-warning">
                <p class="text-danger">{{$e}}</p>
            </div>
        @endforeach
    </form>

{{--    <div class="alert alert-warning">--}}
{{--        <p class="text-danger">{{$errors}}</p>--}}
{{--    </div>--}}
{{--    @if($errors  = $errors->first('input'))--}}
{{--        --}}
{{--    @endif--}}
@endsection
