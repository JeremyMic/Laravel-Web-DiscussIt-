@extends('template')

@section('content')

<form class="form_1" method="POST" action="{{route('validatePost')}}" style="margin: 5% 5% 5% 5%" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="mb-3">
        <label for="name" class="white-text">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Your title here">
    </div>

    <div class="mb-3" class="reply-container">
        <label for="content" class="white-text">Post Content</label>
        <textarea class="form-control" id="content" name="content" rows="10"></textarea>
    </div>

    <div class="mb-3">
        <label for="role" class="white-text">Genre</label>
        <select class="form-select" name="category" aria-label="Genre">
            <option selected value="-1">Choose</option>
            @for ($i = 0; $i < count($data); $i++)
                <option value="{{$data[$i]->id}}">{{$data[$i]->category_name}}</option>
            @endfor
        </select>
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn my-button">Submit</button>
    </div>
   
    @foreach($errors->all() as $e)
        <div class="alert alert-warning">
            <p class="text-danger">{{$e}}</p>
        </div>
    @endforeach

</form>

@endsection