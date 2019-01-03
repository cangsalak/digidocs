@extends('layouts.app')

@section('template')
    
@endsection

@section('content')
<div class="container">
   <div class="flex-center position-ref full-height">
        <div class="col-md-12">
            <div class="content">
            	<div class="row">
	            	<div class="col-md-8 offset-md-2 entity-new-style">
                       @include('layouts.alert')
                            <div class="card">
                                <div class="card-header">{{ __('form.createEntity') }}</div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {!! Form::model($entity,['enctype' => 'multipart/form-data','id'=>'form-table','route'=>['entity.store'],'method'=>'POST']) !!}
                                                    
                                                    @include('entity.form')

                                                {!! Form::close() !!}
                                                                    
                                            </div>
                                        </div>                                                  
                                    </div>
                                </div>
                            </div>                     
	            	</div>
            	</div>
            </div>            	
        </div>
    </div>
</div>
@endsection


@section('style')
<style>    
</style>
@endsection