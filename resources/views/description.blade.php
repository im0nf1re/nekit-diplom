@extends('layouts.app')

@section('content')
    <div class="description">
      <h1 class="h1" align="center">
        {{ $monument->name }}
      </h1>

      <div class="textcols">
        <div class="textcols-left">
          <div class="short-description">
            {{ $monument->short_description }}
          </div>
        </div>
        <div class="textcols-right">
          <img class="preview_picturs" src="{{ asset($monument->preview_img_path) }}">
        </div>
      </div>

      <!-- Попробовать реализовать разворот остальной части -->
      <div class="">
        <div class="full-description">
          {{ $monument->full_description }}
        </div>

        <div class="sim-slider">
          <ul class="sim-slider-list">
            <?php $i = 0 ?>
            <li><img src="http://pvbk.spb.ru/inc/slider/imgs/no-image.gif" alt="screen"></li>
            @foreach ($detail_pictures as $detail_picture)
            <li class="sim-slider-element">
              <img class="detail_pictures" src="{{ asset($detail_picture->path) }}" alt="<?php $i ?>">
            </li>
            <?php $i++ ?>
            @endforeach
          </ul>
          <div class="sim-slider-arrow-left"></div>
          <div class="sim-slider-arrow-right"></div>
          <div class="sim-slider-dots"></div>
        </div>
      </div>
    </div>

    @auth
      <div class="Vis">
        <!-- Visited -->
        @if(!$monument->is_visited())
          <a href="/visited/{{  $monument->id }}">
            <button type="submit" name="button" class="btnVis1">
              Посетил
            </button>
          </a>
        @endif
        <!-- Want to visit -->
        @if(!$monument->is_want_to_visit())
          <a href="/visit/{{  $monument->id }}">
            <button type="submit" name="button" class="btnVis2">
              Хочу посетить
            </button>
          </a>
        @endif
      </div>
    @endauth
@endsection
