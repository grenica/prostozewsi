@extends('layouts.farmer')

@section('content')

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card card-default">
               <div class="card-header">Edycja</div>

               <div class="card-body">
                   @if (session('status'))
                       <div class="alert alert-success alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           {{ session('status') }}
                       </div>
                   @endif
                   {!! Form::model($article, ['route' => ['farmer.article.update', $article->id], 'method' => 'put']) !!}
                        {{-- @include('farmer.article._form') --}}
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
                            {!! Form::select('unit_id',$unitsAll,$unit->id,['class'=>($errors->has('unit_id')) ? 'form-control is-invalid' : 'form-control'])  !!}
                            <span class="text-danger">{{ $errors->first('unit_id') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('feature_id') ? 'has-error' : '' }}">
                            {!! Form::label('feature_id','Cechy')  !!}
                            @foreach ($featuresAll as $feature)
                                <div class="form-check form-check-inline">
                                    {!! Form::label('unit_id',$feature->name,['class'=>'form-check-label'])  !!}
                                    @if ($feature->checked)
                                        {!! Form::checkbox('feature[]', $feature->id,true,['class'=>'form-check-input']) !!}
                                    @else
                                        {!! Form::checkbox('feature[]', $feature->id,false,['class'=>'form-check-input']) !!}
                                    @endif
                                    {{-- @foreach($features as $fr)
                                        @if ($feature->name == $fr->name)
                                            {!! Form::checkbox('feature[]', $feature->id,true,['class'=>'form-check-input']) !!}
                                        @else
                                        {!! Form::checkbox('feature[]', $feature->id,false,['class'=>'form-check-input']) !!}
                                        @endif
                                        
                                    @endforeach --}}
                                    {{-- {!! Form::checkbox('feature[]', $feature->id,false,['class'=>'form-check-input']) !!} --}}
                                </div>
                            @endforeach
                            {{-- {!! Form::select('feature_id',$features ,null,['class'=>($errors->has('feature_id')) ? 'form-control is-invalid' : 'form-control'])  !!} --}}
                            <span class="text-danger">{{ $errors->first('feature_id') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            {!! Form::label('price','Cena')  !!}
                            {!! Form::text('price',null,['class'=>($errors->has('price')) ? 'form-control is-invalid' : 'form-control'])  !!}
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                           
                        </div>
                        
                        {!! Form::hidden('hidden_id',$article->id,['id' => 'hidden_id'])  !!}
                        {!! Form::hidden('category_id',$article->category_id,['id' => 'category_id'])  !!}
                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Zapisz</button>
                    {!! Form::close() !!}

               </div>
               {{-- @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif --}}
           </div>
       </div>
   </div>
</div>


@endsection