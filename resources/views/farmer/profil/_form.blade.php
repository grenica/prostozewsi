
<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    {!! Form::label('name','Obraz')  !!}
    {!! Form::file('image',null,['class'=> ($errors->has('image')) ? 'form-control is-invalid' : 'form-control'])  !!}
    <span class="text-danger">{{ $errors->first('image') }}</span>
    
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label('name','Nazwa gospodarstwa')  !!}
        {!! Form::text('name',null,['class'=> ($errors->has('name')) ? 'form-control is-invalid' : 'form-control'])  !!}
        <span class="text-danger">{{ $errors->first('name') }}</span>
        
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    {!! Form::label('phone','Telefon')  !!}
    {!! Form::text('phone',null,['class'=> ($errors->has('phone')) ? 'form-control is-invalid' : 'form-control'])  !!}
    <span class="text-danger">{{ $errors->first('phone') }}</span>
 </div>

<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
    {!! Form::label('city','Miejscowość')  !!}
    {!! Form::text('city',null,['class'=>($errors->has('city')) ? 'form-control is-invalid' : 'form-control'])  !!}
    <span class="text-danger">{{ $errors->first('city') }}</span>
   
</div>
<div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
    {!! Form::label('number','Numer domu (opcjonalnie)')  !!}
    {!! Form::text('number',null,['class'=>($errors->has('number')) ? 'form-control is-invalid' : 'form-control'])  !!}
    <span class="text-danger">{{ $errors->first('number') }}</span>
</div>
<div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
    {!! Form::label('lat','Lat')  !!}
    {!! Form::text('lat',null,['class'=>($errors->has('lat')) ? 'form-control is-invalid' : 'form-control'])  !!}
    
    {!! Form::label('lon','Lon')  !!}
    {!! Form::text('lon',null,['class'=>($errors->has('lon')) ? 'form-control is-invalid' : 'form-control'])  !!}
    
</div>
<div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}">
    {!! Form::label('region_id','Województwo')  !!}
    {!! Form::select('region_id',$region ,null,['class'=>($errors->has('region_id')) ? 'form-control is-invalid' : 'form-control'])  !!}
    <span class="text-danger">{{ $errors->first('region_id') }}</span>
</div>
<div class="form-group">
    {!! Form::button('Zapisz',['type'=>'submit','class'=>'btn btn-primary'])  !!}
</div>