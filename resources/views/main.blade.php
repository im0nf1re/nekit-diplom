@extends('layouts.app')

@section('content')
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="" style="margin: auto">
      <ul class="navbar-nav">
        @foreach ($categories as $category)
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" data-category-id="{{ $category->id }}">{{ $category->name }}</a>
          </li>
        @endforeach
      </ul>
    </div>
  </nav>

  <div class="" style="margin-top: 50px;">
    <div class="" id="map" style="background: url( {{ asset('images/crimea.png') }} ) no-repeat center;  width: 980px; height: 641px; margin: auto; position: relative">

    </div>
  </div>
@endsection
