@extends('layouts.app')

@section('template')
    
@endsection

@section('content')
<div class="container">
   <div class="flex-center position-ref full-height">
        <div class="col-md-12">
            <div class="content">
            	<div class="row">
	            	<div class="col-md-8 entity-new-style">
                        @include('layouts.alert')
                        <div class="card">
                            <div class="card-header">{{ __('form.createEntity') }}</div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Form::model($entity,['enctype' => 'multipart/form-data','id'=>'form-entity','route'=>['entity.store'],'method'=>'POST']) !!}
                                                
                                                @include('entity.form')

                                            {!! Form::close() !!}
                                                                
                                        </div>
                                    </div>                                                  
                                </div>
                            </div>
                        </div>                     
	            	</div>
                    <div class="col-md-4">
                        <div class="col-md-12 form-group">
                            <div class="col-md-12 img-container">
                                {{ Html::image('images/scutcheon/default2.png','Imagen no disponible',array('id'=>'img_scutcheon_img1','style'=>'width: 100%; border:2px solid #ddd;border-radius: 0%;','onclick'=>'$("#img_scutcheon1").trigger("click")'))}}
                                
                                @if($errors->has('image1'))                         
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $errors->first('image1') }}</strong>
                                    </span>
                                @endif

                            </div>                            
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="col-md-12 img-container">
                                {{ Html::image('images/scutcheon/default2.png','Imagen no disponible',array('id'=>'img_scutcheon_img2','style'=>'width: 100%; border:2px solid #ddd;border-radius: 0%;','onclick'=>'$("#img_scutcheon2").trigger("click")'))}}
                                
                                @if($errors->has('image2'))                         
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $errors->first('image2') }}</strong>
                                    </span>
                                @endif

                            </div>
                            
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="col-md-6 offset-md-3 button-submit">
                                <button type="submit" class="btn btn-primary" style="width: 100%;" form="form-entity">
                                    {{ __('messages.Send') }}
                                </button>
                            </div>
                        </div>

                    </div>
            	</div>
            </div>            	
        </div>
    </div>
</div>
<!-- Form en blanco para consultar Ciudades -->
{!! Form::open(array('id'=>'form_consult_city','url' => 'citytrait')) !!}      
{!! Form::close() !!}

@endsection

@section('script')
    <script type="text/javascript">         

        $("#department").change(function() {
            var datos = new Array();
            datos['id'] =$( "#department option:selected" ).val();             
            ajaxobject.peticionajax($('#form_consult_city').attr('action'),datos,"home.consultaRespuestaCity");
        });

        $('#img_scutcheon1').change(function(e) {
            var file = e.target.files[0],
            imageType = /image.*/;
            
            if (!file.type.match(imageType))
            return;
          
            var reader = new FileReader();
            reader.onload = function(e) {
                var result=e.target.result;
                $('#img_scutcheon_img1').attr("src",result);
            }
            reader.readAsDataURL(file);
        });

        $('#img_scutcheon2').change(function(e) {
            var file = e.target.files[0],
            imageType = /image.*/;
            
            if (!file.type.match(imageType))
            return;
          
            var reader = new FileReader();
            reader.onload = function(e) {
                var result=e.target.result;
                $('#img_scutcheon_img2').attr("src",result);
            }
            reader.readAsDataURL(file);
        });

    </script>
@endsection

@section('style')
<style>    
</style>
@endsection