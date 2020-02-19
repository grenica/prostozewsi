<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label('name','Nazwa planu')  !!}
        {!! Form::text('name',null,['class'=> ($errors->has('name')) ? 'form-control is-invalid' : 'form-control'])  !!}
        <span class="text-danger">{{ $errors->first('name') }}</span>
        
       </div>
<div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
    {!! Form::label('desc','Opis')  !!}
    {!! Form::text('desc',null,['class'=>($errors->has('desc')) ? 'form-control is-invalid' : 'form-control','placeholder' => 'Wpisz opis..'])  !!}
    <span class="text-danger">{{ $errors->first('desc') }}</span>
 </div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    {!! Form::label('price','Cena')  !!}
    {!! Form::text('price',null,['class'=>($errors->has('price')) ? 'form-control is-invalid' : 'form-control'])  !!}
    <span class="text-danger">{{ $errors->first('price') }}</span>
   
</div>
<div class="form-group {{ $errors->has('diff_dates') ? 'has-error' : '' }}">
    {!! Form::label('diff_dates','Róznica czasu(miesięcy)')  !!}
    {!! Form::text('diff_dates',null,['class'=>($errors->has('diff_dates')) ? 'form-control is-invalid' : 'form-control'])  !!}
    <span class="text-danger">{{ $errors->first('diff_dates') }}</span>
</div>
{!! Form::hidden('hidden_id','',['id' => 'hidden_id'])  !!}
