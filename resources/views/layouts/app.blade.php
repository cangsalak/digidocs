<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DigiDocs') }}</title>

    <!-- Scripts -->
    <!--
    <script src="{{ asset('js/app.js') }}" defer></script>
    -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">        
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--> 
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">    
    
    @yield('template')
    @yield('style')
</head>
<body>    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'DigiDocs') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest                            
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-flag"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" onclick="$('#form_locale_en').submit()" > {{ __('messages.English') }}</a>
                                    <a class="dropdown-item" href="#" onclick="$('#form_locale_es').submit()" >{{ __('messages.Spanish') }}</a>
                                </div>
                            </div>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                            </li>                            
                        @else                            

                            @if(Session::has('permits'))
                                @foreach (Session::get('permits') as $key_permit => $permit)
                                    
                                    @if($permit['active'])
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ $key_permit }} <span class="caret"></span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">                                       
                                            @foreach ($permit['options'] as $key_option => $option)
                                                
                                                @if($option['active'])
                                                    @if(json_decode($option['label'], true)['menu'] == 'top')
                                                        <a class="dropdown-item" href="{{ route(json_decode($permit['label'], true)['action'].'.'.$option['name']) }}"
                                                           onclick="event.preventDefault();
                                                                         document.getElementById('{{json_decode($permit['label'], true)['action'].'-'.$option['name'].'-form'}}').submit();">
                                                            <i class="{{ json_decode($option['label'], true)['icon'] }}"></i>
                                                            {{  $option['name'] }}
                                                        </a>

                                                        {!! Form::open(array('id'=>json_decode($permit['label'], true)['action'].'-'.$option['name'].'-form','route' => json_decode($permit['label'], true)['action'].'.'.$option['name'],'method' => json_decode($option['label'], true)['method'])) !!}
                                                        {!! Form::close() !!}
                                                    @endif                                            
                                                @endif

                                            @endforeach
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endif


                            @if(Auth::user()->rol_id == 1)
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                                    @endif
                                </li>
                            @endif
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>                                
                                

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!--Forms para cambio de idioma post-->
        {!! Form::open(array('url' => '/locale', 'id'=>'form_locale_en' )) !!}
            {!! Form::hidden('lang','en') !!}            
        {!! Form::close() !!}
        
        {!! Form::open(array('url' => '/locale', 'id'=>'form_locale_es' )) !!}
            {!! Form::hidden('lang','es') !!}            
        {!! Form::close() !!}

        <main class="py-4">
            @yield('content')
        </main>

        @yield('modal')
        <!--Bootatrap JS, Popper.js, and jQuery-->
        
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>        
        <script type="text/javascript" src="{{ url('js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/home.js') }}"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="{{ asset('js/ajaxobject.js') }}"></script> 
        
        @yield('script')        

    </div>
</body>
</html>
