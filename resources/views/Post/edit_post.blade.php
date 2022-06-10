@extends('template')

@section('content')

<div class="page-header">
    <h1>Edit Post</h1>
</div>

<form METHOD="post" class="form-new rounded-border" action="{{route('validateEditPost')}}" style="margin: 5% 30% 0% 30%; padding: 1%" >
    {{csrf_field()}}
    <div class="container rounded bg-white form-container w-100">
        <input type="hidden" value="{{$data->id}}" name="id" id="id">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Your title here" value="{{ old('name', $data->title) }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Post Content</label>
            <textarea class="form-control text-area" id="content" name="content" cols="30" rows="10">{{ old('name', $data->content) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Categories</label>
            <select class="form-select" name="category" aria-label="Genre">
                <option selected value="-1">Choose</option>
                @for ($i = 0; $i < count($category); $i++)
                    @if($category[$i]->id == $cat_detail->category_id)
                        <option value="{{$category[$i]->id}}" selected>{{$category[$i]->category_name}}</option>
                    @else
                        <option value="{{$category[$i]->id}}">{{$category[$i]->category_name}}</option>
                    @endif
                @endfor
            </select>
        </div>

        <div class="mt-5 mb-3 text-center">
            <button class="btn btn-primary profile-button" type="submit" style="width: 30%; font-size: large">
                Update Post
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