<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else

                        <div class="dropdown">
                            <button class="btn dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-flag"></i>
                            </button>
                            <div class="dropdown-menu menu-lang" aria-labelledby="dropdownMenuButton">
                                <!--
                                <a class="dropdown-item" href="{{ route('locale',['lang'=>'es']) }}">Español</a>
                                <a class="dropdown-item" href="{{ route('locale',['lang'=>'en']) }}">English</a>
                                -->
                                <button type="submit" form = "form_locale_en" class="btn bnt-lang">
                                    {{ __('messages.English') }}
                                </button>
                                <button type="submit" form = "form_locale_es" class="btn bnt-lang">
                                    {{ __('messages.Spanish') }}
                                </button>
                            </div>
                        </div>

                        <a href="{{ route('login') }}">{{ __('messages.Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <!--Forms para cambio de idioma post-->
            {!! Form::open(array('url' => '/locale', 'id'=>'form_locale_en' )) !!}
                {!! Form::hidden('lang','en') !!}            
            {!! Form::close() !!}
            
            {!! Form::open(array('url' => '/locale', 'id'=>'form_locale_es' )) !!}
                {!! Form::hidden('lang','es') !!}            
            {!! Form::close() !!}

            <div class="content">
                <div class="title m-b-md">
                    DigiDocs
                </div>
                <!--
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                -->
            </div>
        </div>
    </body>
</html>
