<div class="form-group row">
	{!! Form::label('nit',__('messages.Nit'),['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		@if($errors->has('nit'))
			{!! Form::text('nit',null, ['class'=>'form-control is-invalid']) !!}
			<span class="invalid-feedback">
                <strong>{{ $errors->first('nit') }}</strong>
            </span>
		@else
			{!! Form::text('nit',null, ['class'=>'form-control']) !!}
		@endif	
	</div>
</div>

<div class="form-group row">
	{!! Form::label('name',__('messages.Name'),['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		@if($errors->has('name'))
			{!! Form::text('name',null, ['class'=>'form-control is-invalid']) !!}
			<span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
		@else
			{!! Form::text('name',null, ['class'=>'form-control']) !!}
		@endif	
	</div>
</div>

<div class="form-group row">
	{!! Form::label('department',__('messages.DepartmentLabel'),['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		{!! Form::select('department',$departments,null, array('class' => 'form-control chosen-select','placeholder'=>__('messages.Department'))) !!}
		@if ($errors->has('department'))		                        	
            <span class="invalid-feedback" style="display: block;">
                <strong>{{ $errors->first('department') }}</strong>
            </span>
        @endif
	</div>
</div>

<div class="form-group row">
	{!! Form::label('city',__('messages.CityLabel'),['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		{!! Form::select('city',$cities,null, array('class' => 'form-control chosen-select','placeholder'=>__('messages.City'))) !!}
		@if ($errors->has('city'))		                        	
            <span class="invalid-feedback" style="display: block;">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
	</div>
</div>
