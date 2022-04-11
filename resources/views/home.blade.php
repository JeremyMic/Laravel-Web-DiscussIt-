@extends('template')

@section('content')

{{-- Search bar here --}}
<form  class="input-group card-spacing" action="/search" method="GET" style="width: 98%; margin: 2% 1%">
    {{ csrf_field() }}
    <input type="search" class="form-control rounded" name="q" placeholder="Search">
    <input type="submit"  class="btn btn-outline-primary">
</form>

@if(auth()->check())
    <a class="btn btn-primary" href="/create-post" role="button" style="max-width: 512px; margin: 0 1%">Create Post</a>
@endif

{{-- Forum List Here --}}
@for($i = 0; $i < count($data); $i++)
    <div class="card" style="border: solid 1px; margin: 2% 1%">
        <div class="card-header header-bg">
            Posted By : {{$data[$i]->name}} 
            <p style="margin: 0">
                {{$data[$i]->post_date}}
            </p>
        </div>
        <div class="card-body">
        <h5 class="card-title">{{$data[$i]->title}}</h5>
        <p class="card-text">{{$data[$i]->content}}</p>
        <div class="btn-group me-2" role="group" aria-label="Second group">
            <a class="btn btn-outline-primary" href="replies/{{$data[$i]->post_id}}">
                <i class="bi bi-chat-left"></i>
            </a>
            @php($up = 0)
            @php($down = 0)
            @if(auth()->user()) 
                @if($vote != null)
                    @for($j = 0; $j < count($vote); $j++)
                        @if($vote[$j]->user_id == auth()->user()->id && $vote[$j]->post_id == $data[$i]->post_id)
                            @if($vote[$j]->vote_id == 2)
                                {{-- <a class="btn btn-outline-primary" href="upVote/{{$data[$i]->post_id}}">
                                    <i class="bi bi-arrow-up-circle-fill" style="color: aqua"></i>
                                </a> --}}
                                @php($up = 1)
                            @endif
                            @if($vote[$j]->vote_id == 1)
                                {{-- <a class="btn btn-outline-primary" href="downVote/{{$data[$i]->post_id}}">
                                    <i class="bi bi-arrow-down-cirlce-fill" style="color: aqua"></i>
                                </a> --}}
                                @php($down = 1)
                            @endif
                            @break
                        @endif
                    @endfor
                @endif
                
                @if($up == 0)
                    <a class="btn btn-outline-primary" href="upVote/{{$data[$i]->post_id}}">
                        <i class="bi bi-arrow-up-circle"></i>
                    </a>
                @else
                    <a class="btn btn-outline-primary" href="upVote/{{$data[$i]->post_id}}">
                        <i class="bi bi-arrow-up-circle-fill" style="color: aqua"></i>
                    </a>
                @endif

                @if($down == 0)
                    <a class="btn btn-outline-primary" href="downVote/{{$data[$i]->post_id}}">
                        <i class="bi bi-arrow-down-circle"></i>
                    </a>
                @else
                    <a class="btn btn-outline-primary" href="downVote/{{$data[$i]->post_id}}">
                        <i class="bi bi-arrow-down-circle-fill" style="color: aqua"></i>
                    </a>
                @endif
            @endif
            </div>
        
        </div>
    </div>
@endfor

<nav aria-label="Page navigation example" style="margin-top: 2%">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="{{$data->previousPageUrl()}}">Prev</a>
        </li>
        @for($i = 1; $i <= $data->lastPage(); $i++)
            @if($i == $data->currentPage())
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">{{$i}}</a>
                </li>
            @else
                <li class="page-item"><a class="page-link" href="{{$data->url($i)}}">{{$i}}</a></li>
            @endif
        @endfor
        <li class="page-item">
            <a class="page-link" href="{{$data->nextPageUrl()}}">Next</a>
        </li>
    </ul>
</nav>


@endsection
