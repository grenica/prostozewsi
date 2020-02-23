@extends('layouts.farmer')

@section('content')
<div class="container">
   
    <div class="row">
      <div class="col-12">
        <div class="card">
        <div class="card-header">
        <h3 class="card-title">Obrazki</h3>
        </div>
          <div class="card-body">
             
          <h5>Dodaj obraz do produktu: {{ $id}}</h5>
                {{-- <form id="form"> --}}
                {!! Form::open(array('route'=>'farmer.artimages.store','files'=>'true')) !!}
                <div class="modal-body">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        {!! Form::label('name','Dodaj obraz twojego produktu')  !!}
                        {!! Form::file('file',null,['class'=> ($errors->has('name')) ? 'form-control is-invalid' : 'form-control'])  !!}
                        <span class="text-danger">{{ $errors->first('name') }}</span>  
                </div>
                {{-- <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Kliknik by wybrać plik</label>
                  </div>
                </div> --}}
                {!! Form::hidden('article_id',$id,['id' => 'article_id'])  !!}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Zapisz</button>
                </div>
                {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Dodaj nową jednostkę</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form">
        <div class="modal-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name','Nazwa jednostki')  !!}
                {!! Form::text('name',null,['class'=> ($errors->has('name')) ? 'form-control is-invalid' : 'form-control'])  !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>  
        </div>
       
        {!! Form::hidden('hidden_id','',['id' => 'hidden_id'])  !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Zapisz</button>
        </div>
      </form>
    </div>
  </div>
</div> --}}

@endsection



