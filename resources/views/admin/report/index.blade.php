@extends('layouts.back')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-12">
      <div id="form_result"></div>
    </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
        <div class="card-header">
        <h3 class="card-title">Rynki</h3>
        </div>
          <div class="card-body">
             
            <!--<p class="card-text">Text</p> -->
            
            <a class="btn guzik" data-toggle="modal">
                <i class="icofont-plus-circle icofont-2x"></i>
            </a>
            @if ($markets->isEmpty())
                <div class="alert alert-danger" role="alert">
                    Brak rekordów !!!
                </div>
            @else
                    <table class="display table table-bordered table-hover">
                       <thead>
                           <tr>
                               <th>ID</th>
                               <th>Nazwa</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($markets as $market)
                                <tr>
                                <td>{{$market->id }}</td>
                                <td>{{$market->name }}</td>
                                <td>
                                    <div class="float-right">
                                        
                                <a class="btn btn-outline-info edit" data-id="{{ $market->id }}"><i class="icofont-ui-edit"></i></a>                               
                                {!! Form::model($market,array('route'=>['admin.market.destroy',$market],'method'=>'DELETE','class'=>'d-inline')) !!}
                                {!! Form::button('<i class="icofont-ui-delete"></i>',['type'=>'submit','class'=>'btn btn-sm btn-outline-danger  clearfix'])  !!}
                                {!! Form::close() !!}
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            @endif

          </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Dodaj nowy rynek</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form">
        <div class="modal-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name','Nazwa ryneczku')  !!}
                {!! Form::text('name',null,['class'=> ($errors->has('name')) ? 'form-control is-invalid' : 'form-control'])  !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>  
        </div>
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('city','Miejscowość')  !!}
                {!! Form::text('city',null,['class'=> ($errors->has('city')) ? 'form-control is-invalid' : 'form-control'])  !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>  
        </div>
        <div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('lat','Lat')  !!}
        {!! Form::text('lat',null,['class'=> ($errors->has('lat')) ? 'form-control is-invalid' : 'form-control'])  !!}
    </div>
    <div class="form-group col-md-6">
    {!! Form::label('lon','Lon')  !!}
        {!! Form::text('lon',null,['class'=> ($errors->has('lon')) ? 'form-control is-invalid' : 'form-control'])  !!}
    </div>
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
</div>

@endsection

@section('js')
<script>
$(document).ready(function() {
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
  });

  $('#form').on('submit', function(e){
      e.preventDefault();
      
      var state = $('#hidden_id').val();
      var action_url ='';
      var metoda = '';

      if(state == '') {
        action_url = "{{ route('admin.market.store') }}";
        metoda = "POST";
      } else {
        action_url = '/admin/market/'+state;
        metoda = "PUT";
      }
        $.ajax({
          data: $('#form').serialize(),
          url: action_url,
          type: metoda,
          dataType: "json",
          success: function(data) {
            // chowam formularz
            $('#ModalCenter').modal("hide");
           // html = '<div class="alert alert-success" role="alert">'+ data.success +'</div>';
            $('#form')[0].reset();
            
          },
          error: function(data) {
            console.log('Error', data);
            html = '<div class="alert alert-danger" role="alert"></div>';
            for(var count=0; count < data.errors.length; count++) {
              html += '<p>' + data.errors[count] + '</p>';
            }
            html += '</div>';
          }
        });
      
  });

  $('.guzik').click(function() {
    // alert('dupa');
    $('#ModalCenter').modal("show");
    $('#form')[0].reset();
    $('#hidden_id').val('');
  });
 
  // edycja
  $('.edit').click(function() {
    var id = $(this).attr('data-id');
    //console.log(id);
    $.ajax({
      url: "/admin/market/"+id+"/edit",
      dataType:"json",
      success: function(data) {
          $('#name').val(data.result.name);
          $('#city').val(data.result.city);
          $('#lat').val(data.result.lat);
          $('#lon').val(data.result.lon);
          $('#hidden_id').val(data.result.id);
          // dodaje ukrutą metode do ubsługi PUT (UPDATE)
          $('#form').append('<input type="hidden" name="_method" value="PUT">');
          $('#ModalCenter').modal("show");
      }
    });
  });

});
</script>
@endsection

