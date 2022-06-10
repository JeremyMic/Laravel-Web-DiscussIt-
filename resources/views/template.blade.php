<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Name</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{asset('styling/style.css')}}">
    <link rel="stylesheet" href="{{asset('styling/nav.css')}}">
    <script src="{{asset('Js/clock.js')}}" defer></script>
</head>
<body onload="realtimeClock()">
<div>
    <header>
        <nav class="navbar shadow-sm p-3 mb-2 navbar-expand-lg">
            <div class="container-fluid">
              <a class="navbar-brand ms-5 me-5 logo-title" href="/">DiscussIt</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item nav-btn">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item nav-btn">
                        <a class="nav-link" aria-current="page" href="/category">Categories</a>
                    </li>
                  @if(auth()->check())
                        <li class="nav-item dropdown nav-btn">
                            <a class="nav-link dropdown-toggle" href="/profile" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Posts
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/">All Posts</a></li>
                                <li><a class="dropdown-item" href="/my-post">My Posts</a></li>
                                <li><a class="dropdown-item" href="/create-post">Create Post</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item nav-btn">
                            <a class="nav-link" aria-current="page" href="/">All Posts</a>
                        </li>
                    @endif
                        
                </ul>
                <div class="d-flex">
                    <a class="nav-link" id="datetime"></a>
                </div>
                <form action="/search" method="GET">
                    {{ csrf_field() }}
                    <div class="d-flex input-group-md me-3 rounded">
                        <input type="search" class="form-control rounded" placeholder="Search Posts" aria-label="Search" aria-describedby="search-addon" name="q" />
                        <button type="submit" class="btn btn-primary">
                            <i class='bx bx-search' ></i>
                        </button>
                    </div>
                </form>
    
                <ul class="navbar-nav mb-2 mb-lg-0">
                  @if(auth()->check()) 
                    <li class="nav-item d-flex dropdown profile">
                        <i class='bx bxs-user-circle'></i>
                        <a class="nav-link dropdown-toggle profile-name" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/update">Update</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                  @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/register">Register</a>
                    </li>
                  @endif
                </ul>
            </div>
        </nav>

        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-color">
            <div class="container-fluid">
              <a class="navbar-brand title-text" href="/">Discuss IT</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active white-text" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active white-text" aria-current="page" href="/category">Categories</a>
                  </li>

                  <span class="navbar-text disabled-text">
                    @if(!auth()->check())
                        Hello, Guest!
                    @else
                        Welcome Back, {{auth()->user()->name}}
                    @endif
                    </span>
                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link white-text" id="datetime"></a>
                        </li>
                        @if(!auth()->check())
                            <li class="nav-item">
                                <a class="nav-link white-text"  href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link white-text" href="/register">Register</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link white-text"  href="/profile/{{auth()->user()->id}}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link white-text" href="/logout">Logout</a>
                            </li>
                        @endif
                    </ul>
                </span>
              </div>
            </div>
          </nav> --}}
    </header>

    <div style="padding-bottom: 20px">
        @yield('content')
    </div>
</div>

{{--<footer class="page-footer bg-dark text-center text-lg-start">--}}

{{--    <div class="footer-copyright text-center text-light p-3">--}}
{{--        © 2022 Copyright:--}}
{{--        <a class="text-light" href="/">BMDb.com</a>--}}
{{--    </div>--}}
{{--</footer>--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
