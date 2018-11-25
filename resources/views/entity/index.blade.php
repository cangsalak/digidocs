@extends('layouts.app')

@section('template')
    
@endsection

@section('content')
<div class="container">
   <div class="flex-center position-ref full-height">
        <div class="col-md-12">
            <div class="content">
                {{$data['entities']}}
            </div>
        </div>
    </div>
</div>
@endsection


@section('style')
<style>
</style>
@endsection