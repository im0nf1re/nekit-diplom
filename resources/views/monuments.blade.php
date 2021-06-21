@foreach ($monuments as $monument)
  <img class="preview_img_path" src="{{ $monument->preview_img_path }}" style="width: 225px; height: 225px; display: none;"  align="right">

  <div class="name" data-monument-id='{{ $monument->id }}' data-monument-name style="display: none; font-size: 30px; font-style : italic; padding: 30px;">
    {{ $monument->name }}
  </div>

  @auth
    <a href="/description/{{ $monument->id }}">
      @if ($monument->is_want_to_visit())
        <div class="graits" style="background: url( {{ asset('images/toVisit.png') }} ); position: absolute; width: 22px; height: 30px;
        left: {{ $monument->x_coordinate }}px; top: {{ $monument->y_coordinate }}px;"></div>
      @elseif ($monument->is_visited())
        <div class="graits" style="background: url( {{ asset('images/visited.png') }} ); position: absolute; width: 22px; height: 30px;
        left: {{ $monument->x_coordinate }}px; top: {{ $monument->y_coordinate }}px;"></div>
      @else
        <div class="graits" style="background: url( {{ asset('images/graits.png') }} ); position: absolute; width: 22px; height: 30px;
        left: {{ $monument->x_coordinate }}px; top: {{ $monument->y_coordinate }}px;"></div>
      @endif
    </a>
  @endauth

  @guest
      <a href="/description/{{ $monument->id }}">
        <div class="graits" style="background: url( {{ asset('images/graits.png') }} ); position: absolute; width: 22px; height: 30px;
        left: {{ $monument->x_coordinate }}px; top: {{ $monument->y_coordinate }}px;"></div>
      </a>
  @endguest
@endforeach
