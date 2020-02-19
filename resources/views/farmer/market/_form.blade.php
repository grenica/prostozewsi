<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('market_id','Rynek')  !!}
    {!! Form::select('market_id',$allmarkets ,null,['class'=>($errors->has('market_id')) ? 'form-control is-invalid' : 'form-control'])  !!}   
    <span class="text-danger">{{ $errors->first('name') }}</span>
   </div>
