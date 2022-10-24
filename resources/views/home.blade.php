@extends('template')

@section('content')
<div id="hero" class="d-flex justify-content-center align-items-center" style="background: url({{asset('storage/banner/banner.jpg')}}) top center;">
    <div class="container position-relative banner-content">
      <h1>Welcome to DiscussIt</h1>
      <h2>A place for students to discuss and learn together</h2>
      <a href="/post" class="btn-start">
        Start Discussing
      </a>
    </div>
  </div>

  <div id="rules" class="d-flex">
    <div class="container position-relative mt-3">
      <div class="row rules-content">
        <div class="col-lg-8 mt-5 mb-auto ms-auto me-auto order-1 order-lg-2 img-content">
          <img src="{{asset('storage/banner/banner.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-4 mt-5 ms-5 order-2 order-lg-1 content">
          <h1>Website Rules</h1>
          <ul class="mt-5">
            <li>Be Respectful Towards Others</li>
            <li>No Racism</li>
            <li>No Spam</li>
            <li>No Sensitive or Political Content</li>
          </ul>
        </div>
      </div>

    </div>
  </div>


@endsection
