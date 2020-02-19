<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <div id="category" class="btn btn-secondary"></div>
   <div id="category_container"></div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label('name','Nazwa')  !!}
        {!! Form::text('name',null,['class'=> ($errors->has('name')) ? 'form-control is-invalid' : 'form-control'])  !!}
        <span class="text-danger">{{ $errors->first('name') }}</span>
</div>
<div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
    {!! Form::label('desc','Opis')  !!}
    {!! Form::textarea('desc',null,['class'=>($errors->has('desc')) ? 'form-control is-invalid' : 'form-control','placeholder' => 'Wpisz opis..'])  !!}
    <span class="text-danger">{{ $errors->first('desc') }}</span>
 </div>
 <div class="form-group {{ $errors->has('unit_id') ? 'has-error' : '' }}">
    {!! Form::label('unit_id','Jednostka miary')  !!}
    {!! Form::select('unit_id',$units ,null,['class'=>($errors->has('unit_id')) ? 'form-control is-invalid' : 'form-control'])  !!}
    <span class="text-danger">{{ $errors->first('unit_id') }}</span>
</div>
<div class="form-group {{ $errors->has('feature_id') ? 'has-error' : '' }}">
    {!! Form::label('feature_id','Cechy')  !!}
    @foreach ($features as $feature)
        {!! Form::checkbox('feature[]', $feature->name) !!}
    @endforeach
    {!! Form::select('feature_id',$features ,null,['class'=>($errors->has('feature_id')) ? 'form-control is-invalid' : 'form-control'])  !!}
    <span class="text-danger">{{ $errors->first('feature_id') }}</span>
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    {!! Form::label('price','Cena')  !!}
    {!! Form::text('price',null,['class'=>($errors->has('price')) ? 'form-control is-invalid' : 'form-control'])  !!}
    <span class="text-danger">{{ $errors->first('price') }}</span>
   
</div>

{!! Form::hidden('hidden_id','',['id' => 'hidden_id'])  !!}
{!! Form::hidden('category_id','',['id' => 'category_id'])  !!}

