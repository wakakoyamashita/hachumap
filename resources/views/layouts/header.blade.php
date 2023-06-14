<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    </head>
  <body>
    <header>
      <div class="container">
        <h1 class="logo"><img src="img/logo.svg" alt="サイトのロゴ"></h1>
        <nav>
          <ul class="header_navi">
            <li><a href="{{ url('/') }}">TOP</a></li>
            <li><a href="{{ url('/shop') }}">Shop info</a></li>
            <li><a href="{{ url('/event') }}">Event info</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
    </main>
  </body>
</html>
