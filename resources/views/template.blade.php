<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Name</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="{{asset('Js/clock.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('styling/style.css')}}">
</head>
<body onload="realtimeClock()">
<div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-color">
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
                  {{-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/profile">Profile</a>
                  </li> --}}
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
          </nav>
    </header>

    <div>
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
