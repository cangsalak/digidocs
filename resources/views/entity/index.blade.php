@extends('layouts.app')

@section('template')
    
@endsection

@section('content')
<div class="container">
   <div class="flex-center position-ref full-height">
        <div class="col-md-12">
            <div class="content">
            	<div class="row">            	
            	@foreach( $data['entities']->items() as $entity)
                	<div class="col-md-4" >{{$entity->name}}</div>
            	@endforeach
            	</div>
            </div>
            {{ $data['entities']->links() }}
            {{ $data['entities']->appends(['sort' => 'votes'])->links() }}
        </div>
    </div>
</div>
@endsection


@section('style')
<style>
</style>
@endsection