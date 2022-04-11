@extends('template')

@section('content')
<div class="card" style="border: solid 1px; margin: 1% 1%">
    <div class="card-header header-bg ">
        Posted By : {{$data->name}} 
        <p style="margin: 0">
            {{$data->post_date}}
        </p>
    </div>
    <div class="card-body">
        <h6 class="card-subtitle mb-2 text-muted">{{$data->category_name}}</h6>
        <h5 class="card-title">{{$data->title}}</h5>
        <p class="card-text">{{$data->content}}</p>
    </div>
</div>

@for($i = 0; $i < count($replies); $i++)
    <div class="card reply-container reply-area">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">
                Replied By : {{$replies[$i]->name}} 
                <p style="margin: 0">
                    {{$replies[$i]->reply_date}}
                </p>
            </h6>
            <p class="card-text">{{$replies[$i]->reply_content}}</p>
        </div>
    </div>
@endfor

@if(auth()->check() && auth()->user()->id != $data->user_id)
    <form class="reply-area" method="post" action="/add-reply">
        {{csrf_field()}}
        <h4>Post a Reply</h4>
        <input type="hidden" value="{{$data->post_id}}" name="post_id">
        <div class="mb-3"  class="reply-container">
            <textarea class="form-control" id="reply" name="reply" rows="6"></textarea>
        </div>
        <div class="mb-3">
            <button class="btn my-button" type="submit">Post</button>
        </div>
    </form>
@endif

@endsection