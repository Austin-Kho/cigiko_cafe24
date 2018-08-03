<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Study Books</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
      html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
      }

      .full-height {
        height: 100vh;
      }

      .flex-center {
        /* align-items: center;
        justify-content: center; */
        display: flex;        
      }

      .position-ref {
          position: relative;
      }

      .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
      }

      /* .content {
        text-align: center;
      } */

      .title {
        font-size: 56px;
      }

      .links > a {
        color: #636b6f;
        padding: 0 60px;
        line-height: 2;
        font-size: 15px;
        font-weight: 250;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
      }
      .links > a:hover { color: #fd5f82; }

      .m-b-md {
        margin: 50px;
      }
    </style>
  </head>
  <body>
    <div class="flex-center position-ref full-height">
      @if (Route::has('login'))
        <div class="top-right links">
          @if (Auth::check())
            <a href="{{ url('/home') }}">Home</a>
          @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
          @endif
        </div>
      @endif

      <div class="content">
        <div class="title m-b-md">
          <a href="/book">Study Books</a>
        </div>
        <div class="links">
          <a href="/book/01">01. 하루10분씩 핵심만 골라 마스터하는 SQL</a>
        </div>
        <div class="links">
          <a href="/book/02">02. 파이썬으로 지루한 작업 자동화 하기&nbsp;&nbsp;</a>
        </div>
        <div class="links">
          <a href="/book/03">03. 개발자를 위한 파이썬(P y t h o n)</a>
        </div>        
      </div>
    </div>
  </body>
</html>