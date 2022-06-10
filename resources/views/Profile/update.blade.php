@extends('template')

@section('content')
    <div class="page-header">
        <h1>Update Profile</h1>
    </div>
    <form METHOD="post" class="form-new" action="/update" style="margin: 0% 10% 0% 10%" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container rounded bg-white mt-5 form-container">
            <div class="row">
                <div class="col-md-3 rounded profile-user">
                    <div class="d-flex flex-column align-items-center text-center p-5 py-5">
                        {{-- <i class='bx bx-user mt-5 user-photo'></i> --}}
                        <img style="width: 100%" src="{{asset("$data->path")}}"  class='bx bx-user mt-5"'alt="">
                        
                        <div style="margin-top: 5%">
                            <input type="file" class="form-control" id="file" name="file">
                            <div id="fileHelp" class="form-text">If no file is choosen, we will keep your old profile picture</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="p-3 mr-5">
                        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                            <h4 class="text-right">Your Profile</h4>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-2">
                              <label class="labels">Name</label>
                              <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $data->name) }}">
                            </div>
                                  
                            <div class="col-md-12 mt-2">
                              <label class="labels">Email</label>
                              <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $data->email) }}">
                            </div>
        
                            <div class="col-md-12 mt-2">
                                <label class="labels">Gender</label><br>

                                @if($data->gender == "Female")
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" checked>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                @else
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="mt-5 mb-3 text-center">
                            <button class="btn btn-primary profile-button" type="submit" style="width: 30%; font-size: large">
                                Save Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
    </script>
    @foreach($errors->all() as $e)
        <div class="alert alert-warning">
            <p class="text-danger">{{$e}}</p>
        </div>
    @endforeach
    {{-- <form class="form_1" action="" style="margin: 5% 5% 5% 5%" enctype="multipart/form-data">
        {{csrf_field()}}
    </form> --}}
@endsection