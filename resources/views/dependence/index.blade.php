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
                            <div class="card-header">{{ __('messages.DependencesService') }}</div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('layouts.options_page',['model'=>'Dependences'])
                                        </div>
                                    </div>                                                  
                                </div>                  
                            </div>                            
                        </div>
                    </div>   
                    <div class="col-md-9">
                        @include('layouts.alert')
                        <div class="card">
                            <div class="card-header">{{ __('messages.indexDependences') }}</div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="content">
                                    	<div class="row">                                        
                                        <div class="col-md-12">                                            
                                            
                                            <div class="page-header">                                               
                                                {{Form::open(['route'=>'dependence.index','method'=>'GET','class'=> 'form-inline pull-right form-center']) }}
                                                    
                                                    <div class="form-group form-search">                             
                                                        {{Form::text('name',$inputs['name'],['class'=>'form-control','placeholder'=>__('messages.name')])}}
                                                    </div>
                                                    <div class="form-group form-search">                             
                                                        {{Form::text('adress',$inputs['adress'],['class'=>'form-control','placeholder'=>__('messages.adress')])}}
                                                    </div>
                                                    <div class="form-group form-search">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                {{Form::close()}}
                                                
                                            </div>
                                            
                                        </div>                                        
                                        @foreach( $dependences as $key => $dependence)                                    	
                                                
                                           <div>{{$dependence->name}}</div>
                                           
                                    	@endforeach

                                    	</div>
                                    </div>

                                 </div>
                            </div>
                            {{ $dependences->links() }}
                            {{-- $data['dependences']->links() --}}
                        </div>
                        {{-- $data['dependences']->appends(['sort' => 'votes'])->links() --}}                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('style')
<style>    
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

</script>
@endsection