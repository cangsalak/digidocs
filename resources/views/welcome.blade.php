@extends('layouts.app')

@section('template')
    <link href="{{ asset('css/custom/welcome.css') }}" rel="stylesheet">    
@endsection

@section('content')
@auth<!-- no fondo -->
@else
    <div class="video-container">
        <video loop="loop" id="video_background" autoplay preload muted>
          <source 
            src="{{ asset('media/digidocs-media-backgrownd.webm') }}" 
            src="{{ asset('media/digidocs-media-backgrownd.mp4') }}"
            type="video/webm">           
          </source>
        </video>
    </div>
@endauth
<div class="container">
   <div class="flex-center position-ref full-height">
        <div class="col-md-12">
            <div class="content">
                <div class="title m-b-md">
                    DigiDocs
                </div>		                
            </div>
        </div>
    </div>
</div>
@endsection


@section('style')
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
        height: 80vh;
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

    

    @media (min-width: 768px) {

    	.title {
	        font-size: 18vh;
	    }

    }

    @media (max-width: 768px) {

    	.title {
	        font-size: 11vh;
	    }

    }

</style>

@endsection