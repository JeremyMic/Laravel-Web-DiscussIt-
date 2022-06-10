@extends('template')

@section('content')
    <div class="page-header">
        <h1>Categories</h1>
    </div>
    <div class="container" style="margin-top: 4%">
        @for($i = 0; $i < count($data); $i++)
            <div class="row" style="margin-top: 1%">
                @if($i + 1 >= count($data))
                    <div class="col col-cat">
                        <a href="/{{$data[$i]->id}}">
                            <div class="card">
                                <div class="cat_img">
                                    <img src="{{asset('storage/category/cat_0'.$data[$i]->id.'.jpg')}}" alt="image">
                                </div>
                                <div class="card-body blue-body-center white-text">
                                    {{$data[$i]->category_name}}
                                </div>
                            </div>
                        </a>
                    </div>
                @else
                    <div class="col col-cat">
                        <a href="/{{$data[$i]->id}}">
                            <div class="card">
                                <div class="cat_img">
                                    <img src="{{asset('storage/category/cat_0'.$data[$i]->id.'.jpg')}}" alt="image">
                                </div>
                                <div class="card-body blue-body-center white-text">
                                    {{$data[$i]->category_name}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @php($i++)  
                    <div class="col col-cat">
                        <a href="/{{$data[$i]->id}}">
                            <div class="card">
                                <div class="cat_img">
                                    <img src="{{asset('storage/category/cat_0'.$data[$i]->id.'.jpg')}}" alt="image">
                                </div>
                                <div class="card-body blue-body-center white-text">
                                    {{$data[$i]->category_name}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        @endfor
    </div>

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