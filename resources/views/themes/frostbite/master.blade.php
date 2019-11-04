@php
  $url_params   = explode('&', str_replace('?', '', strstr(url()->full(), '?')));

  if ($url_params[0] === "") {
      $frost_params = null;
  } else {
      $frost_params = [];
      foreach ($url_params as $param) {
          $param = explode('=', $param);
          $frost_params[$param[0]] = $param[1];
      }
  }
@endphp

@if (!empty(explode("/",url()->current())[3]))
  @php
    $url_arr   = explode("/",url()->current());
    $url_arr   = array_slice($url_arr, 3);

    $class_val = $url_arr[0];
    if(!empty($url_arr[1])) {
      $class_val .= '_' . $url_arr[1];
    }
  @endphp
@else
  @php
    $class_val = "homepage";
  @endphp
@endif

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Captain</title>

    <link rel="shortcut icon" href="/themes/{{ $theme['folder'] }}/images/favicon.png">
    @pagestyle(style)
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    <script>
      window.Frostbite = {
        props: {
          passed_vars: {}
        },
        Form:{
          Login:{}
        },
        Page:{
        }
      };
      @guest
        Frostbite.props.loggedIn = false;
      @endguest
      @auth
        Frostbite.props.loggedIn = true;
      @endauth
    </script>
  </head>

  <body id="page_{{$class_val}}">
    @include('theme::blade.layout.public-header')

    {{-- LOAD CONTENT BODY OF PAGE --}}
    @if (empty (explode("/",url()->current())[3]))
      @yield(
        'content',
        View::make(
          'theme::blade.page.home',
          [
            'frost_params'    => $frost_params,
            // 'frost_user_role' => Auth::user()->role->name,
            // 'frost_user_id'   => Auth::user()->id,
            'frost_group'     => App::make('Groups'),
          ]
        )
      )
    @else
      @php
        $url_arr   = explode("/",url()->current());
        $url_arr   = array_slice($url_arr, 3);
        $route_val = 0;
      @endphp

      @foreach ($url_arr as $key => $value)
        @if ($key > 1)
          @php
            $frost_params['route-'.$route_val] = $value;
            $route_val++;
          @endphp

        @elseif ($key === 0)
          @php
            $theme_val = $value;
          @endphp
        @else
          @php
            if($value === 'd') {
              continue;
            } else {
              $theme_val .= '.' . $value;
            }
          @endphp
        @endif
      @endforeach

      @if (Auth::user())
        @yield(
          'content',
          View::make(
            'theme::blade.page.'.$theme_val,
            [
              'frost_params'    => $frost_params,
              'frost_user_role' => Auth::user()->role->name,
              'frost_user_id'   => Auth::user()->id,
              'frost_group'     => App::make('Groups'),
            ]
          )
        )
      @else
        @yield(
          'content',
          View::make(
            'theme::blade.page.'.$theme_val,
            [
              'frost_params'    => $frost_params,
              'frost_user_role' => 'Guest',
              'frost_user_id'   => null,
              'frost_group'     => null,
            ]
          )
        )
      @endif
    @endif

    @include('theme::blade.layout.public-footer')
    @yield('page_bottom_scripts')
  </body>
</html>
