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
<div class="form-group row">
	{!! Form::label('adress',__('messages.Adress'),['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		@if($errors->has('adress'))
			{!! Form::text('adress',null, ['class'=>'form-control is-invalid']) !!}
			<span class="invalid-feedback">
                <strong>{{ $errors->first('adress') }}</strong>
            </span>
		@else
			{!! Form::text('adress',null, ['class'=>'form-control']) !!}
		@endif	
	</div>
</div>

<div class="form-group row">
	{!! Form::label('phone1',__('messages.Phone').' 1',['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		@if($errors->has('phone1'))
			{!! Form::text('phone1',null, ['class'=>'form-control is-invalid']) !!}
			<span class="invalid-feedback">
                <strong>{{ $errors->first('phone1') }}</strong>
            </span>
		@else
			{!! Form::text('phone1',null, ['class'=>'form-control']) !!}
		@endif	
	</div>
</div>

<div class="form-group row">
	{!! Form::label('phone2',__('messages.Phone').' 2',['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		@if($errors->has('phone2'))
			{!! Form::text('phone2',null, ['class'=>'form-control is-invalid']) !!}
			<span class="invalid-feedback">
                <strong>{{ $errors->first('phone2') }}</strong>
            </span>
		@else
			{!! Form::text('phone2',null, ['class'=>'form-control']) !!}
		@endif	
	</div>
</div>

<div class="form-group row">
	{!! Form::label('phone3',__('messages.Phone').' 3',['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		@if($errors->has('phone3'))
			{!! Form::text('phone3',null, ['class'=>'form-control is-invalid']) !!}
			<span class="invalid-feedback">
                <strong>{{ $errors->first('phone3') }}</strong>
            </span>
		@else
			{!! Form::text('phone3',null, ['class'=>'form-control']) !!}
		@endif	
	</div>
</div>

<div class="form-group row">
	{!! Form::label('email_institutional',__('messages.Email'),['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		@if($errors->has('email_institutional'))
			{!! Form::email('email_institutional',null, ['class'=>'form-control is-invalid']) !!}
			<span class="invalid-feedback">
                <strong>{{ $errors->first('email_institutional') }}</strong>
            </span>
		@else
			{!! Form::email('email_institutional',null, ['class'=>'form-control']) !!}
		@endif	
	</div>
</div>

<div class="form-group row">
	{!! Form::label('description',__('messages.Description'),['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		@if($errors->has('description'))
			{!! Form::text('description',null, ['class'=>'form-control is-invalid']) !!}
			<span class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
		@else
			{!! Form::text('description',null, ['class'=>'form-control']) !!}
		@endif	
	</div>
</div>

<div class="form-group row">
	{!! Form::label('slogan',__('messages.Slogan'),['class'=>'col-sm-4 col-form-label text-md-right']) !!}
	<div class="col-md-8">
		@if($errors->has('slogan'))
			{!! Form::text('slogan',null, ['class'=>'form-control is-invalid']) !!}
			<span class="invalid-feedback">
                <strong>{{ $errors->first('slogan') }}</strong>
            </span>
		@else
			{!! Form::text('slogan',null, ['class'=>'form-control']) !!}
		@endif	
	</div>
</div>

<input id="img_scutcheon1"  style="display: none;" name="image1" type="file">
<input id="img_scutcheon2"  style="display: none;" name="image2" type="file">