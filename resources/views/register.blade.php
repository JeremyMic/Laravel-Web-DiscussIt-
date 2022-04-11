@extends('template')

@section('content')
    <div class="page-header">
        <h1>Register Page</h1>
    </div>
    <form class="form_1" method="POST" action="{{route('registerValidate')}}" style="margin: 5% 5% 5% 5%" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
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
        </div>

        {{-- <div class="mb-3">
            <label for="file">Profile Picture</label>
            <input type="file" class="form-control" name="file" id="file" style="max-width: 240px">
        </div> --}}

        <div class="mb-3">
            <button type="submit" class="btn my-button">REGISTER</button>
        </div>
        <small class="form-text text-muted link disabled-text">Already have an account? 
            <a class="link-info" href="/register">Login here.</a>
        </small>
        
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
