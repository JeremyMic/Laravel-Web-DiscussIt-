@extends('template')

@section('content')
    <div class="div-container">
        <div class="card mb-3" style="margin: 5% 5% 5% 5%; width: 60%;">
            <div class="row g-0">
                <div class="col-md-6 text-container">
                    <div class="card-body">
                        <div class="row">
                            <div class="col" style="width: 30%;">
                                <img style="width: 100%" src="{{asset('storage/image/dummy-user.png')}}" alt="image">
                            </div>
                            <div class="col" style="width: 50%;">
                                <h5 class="card-title">Name  : {{$data->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Email : {{$data->email}}</h6>
                                <a href="/update" class="btn btn-danger">Update Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection