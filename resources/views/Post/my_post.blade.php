@extends('template')

@section('content')

<div style="margin: 0% 1%">
    <p>
        <a class="btn my-button" data-bs-toggle="collapse" href="#collapseForm" role="button" aria-expanded="false" aria-controls="collapseExample">
            Filters
        </a>
    </p>
    <div class="collapse" id="collapseForm">
        <div class="card card-body">
            <form action="/" method="GET">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="filter" id="filter1" value="date">
                    <label class="form-check-label" for="inlineRadio1">Upload Date</label>
                  </div>
                <input type="submit" class="btn btn-primary">
            </form>

        </div>
    </div>
</div>

{{-- Forum List Here --}}
@for($i = 0; $i < count($data); $i++)
    <div class="card" style="border: solid 1px;border-color: rgb(167, 167, 167); margin: 2% 1%">
        <div class="card-header header-bg mb-2 mb-lg-0 ">
            Posted By : {{$data[$i]->name}} 
            <p style="margin: 0">
                {{$data[$i]->post_date}}
            </p>
            <div class="d-flex justify-content-between" style="font-size: x-large">
                <a href="edit-post/{{$data[$i]->post_id}}" style="text-decoration: none; color: white">
                    <i class='bx bx-edit-alt'></i>
                </a>
                <a href="delete-post/{{$data[$i]->post_id}}" style="text-decoration: none; color: rgb(133, 2, 2)">
                    <i class='bx bxs-trash'></i>
                </a>
            </div>
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
                                    @php($up = 1)
                                @endif
                                @if($vote[$j]->vote_id == 1)
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
                            <i class="bi bi-arrow-up-circle-fill" style="color: #2D31FA"></i>
                        </a>
                    @endif

                    @if($down == 0)
                        <a class="btn btn-outline-primary" href="downVote/{{$data[$i]->post_id}}">
                            <i class="bi bi-arrow-down-circle"></i>
                        </a>
                    @else
                        <a class="btn btn-outline-primary" href="downVote/{{$data[$i]->post_id}}">
                            <i class="bi bi-arrow-down-circle-fill" style="color: #2D31FA"></i>
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
