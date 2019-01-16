@extends('layouts.app')

@section('template')
    
@endsection

@section('content')
<div class="container">
   <div class="flex-center position-ref full-height">

    <div class="col-md-12">
            <div class="content">
               <div class="row">

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">{{ __('messages.EntityService') }}</div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('layouts.options_page',['model'=>'Entities'])
                                        </div>
                                    </div>                                                  
                                </div>                  
                            </div>                            
                        </div>
                    </div>   
                    <div class="col-md-9">
                        @include('layouts.alert')
                        <div class="card">
                            <div class="card-header">{{ __('messages.indexEntity') }}</div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="content">
                                    	<div class="row">                                        
                                        <div class="col-md-12">                                            
                                            
                                            <div class="page-header">                                               
                                                {{Form::open(['route'=>'entity.index','method'=>'GET','class'=> 'form-inline pull-right form-center']) }}
                                                    <div class="form-group form-search">                              
                                                        {{Form::text('nit',$inputs['nit'],['class'=>'form-control','placeholder'=>__('messages.nit')])}}
                                                    </div>
                                                    <div class="form-group form-search">                              
                                                        {{Form::text('name',$inputs['name'],['class'=>'form-control','placeholder'=>__('messages.name')])}}
                                                    </div>
                                                    <div class="form-group form-search">                              
                                                        {{Form::text('description',$inputs['description'],['class'=>'form-control','placeholder'=>__('messages.description')])}}
                                                    </div>
                                                    <div class="form-group form-search">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                {{Form::close()}}
                                                
                                            </div>
                                            
                                        </div>                                        
                                        @foreach( $entities as $key => $entity)
                                    	{{--@foreach( $data['entities']->items() as $key => $entity)--}}
                                                
                                            @if(($key+1) % 3 == 1) 
                                                <div class="col-md-12 group-entity">
                                                    <div class="row">
                                            @endif

                                    	    <div class="col-md-4">
                                                <div class="col-md-12 offset-md-0 entity-style">                            
                                                    {{ Form::hidden('entity-id', $entity->id) }}
                                                    <div class="col-md-12">
                                                        {{$entity->nit}}
                                                    </div>
                                                    <div class="col-md-12">
                                                        {{$entity->name}}
                                                    </div>                                
                                                    <div class="col-md-12">
                                                        {{$entity->adress}}
                                                    </div>                                
                                                    <div class="col-md-12">
                                                        {{$entity->department_class()->name}} - {{$entity->city_class()->name}}
                                                    </div>                                
                                                    <div class="col-md-12">
                                                        {{$entity->phone1}} - {{$entity->phone1}} - {{$entity->phone3}}
                                                    </div>                                

                                                </div>                            
                                           </div>

                                           @if(($key+1) % 3 == 0)
                                                    </div>
                                                </div>
                                           @endif
                                           
                                    	@endforeach

                                    	</div>
                                    </div>

                                 </div>
                            </div>
                            {{ $entities->links() }}
                            {{-- $data['entities']->links() --}}
                        </div>
                        {{-- $data['entities']->appends(['sort' => 'votes'])->links() --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('style')
<style>
    .entity-style{
        border: 1px solid black;
        border-radius: 5px;
        cursor: pointer;
        padding: 0px;
    }

    .group-entity{
        margin-bottom: 1%;
    }

    .selected-entity{
        background-color: aliceblue;
    }

    .pagination,.form-center{
        align-items: center;
        justify-content: center;
    }

    .form-search{
        margin: 4px;
    }

    .page-header{
        margin: 10px;   
    }


</style>
@endsection

@section('script')
<script type="text/javascript">   
    
    $('.entity-style').click(function() {
        if($(this).hasClass('selected-entity')){
            $('.entity-style').removeClass("selected-entity");        
            $( "input[name*='id']" ).val('');    
        }else{
            $('.entity-style').removeClass("selected-entity");        
            $(this).toggleClass("selected-entity");
            $( "input[name*='id']" ).val($(this)[0].children[0].value);    
        }
    });    

</script>
@endsection