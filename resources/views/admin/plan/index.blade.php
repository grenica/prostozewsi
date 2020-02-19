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
        <h3 class="card-title">Plany abonamentowe</h3>
        </div>
          <div class="card-body">
             
            <!--<p class="card-text">Text</p> -->
            
            <a class="btn guzik" data-toggle="modal">
                <i class="icofont-plus-circle icofont-2x"></i>
            </a>
            @if ($plans->isEmpty())
                <div class="alert alert-danger" role="alert">
                    Brak rekordów !!!
                </div>
            @else
                    <table class="display table table-bordered table-hover dataTable">
                       <thead>
                           <tr>
                               <th>ID</th>
                               <th>Nazwa</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $plan)
                                <tr>
                                <td>{{$plan->id }}</td>
                                <td>{{$plan->name }}</td>
                                <td>
                                    <div class="float-right">
                                        
                                <a class="btn btn-outline-info edit" data-id="{{ $plan->id }}"><i class="icofont-ui-edit"></i></a>                               
                                {!! Form::model($plan,array('route'=>['admin.plan.destroy',$plan],'method'=>'DELETE','class'=>'d-inline')) !!}
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Dodaj nowy plan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form">
        <div class="modal-body">
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
        action_url = "{{ route('admin.plan.store') }}";
        metoda = "POST";
      } else {
        action_url = '/admin/plan/'+state;
        metoda = "PUT";
      }
        $.ajax({
          data: $('#form').serialize(),
          // url: "{{ route('admin.plan.store') }}",
          // type: "POST",
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
    $('#ModalCenter').modal("show");
    $('#form')[0].reset();
    $('#hidden_id').val('');
  });

  // edycja
  $('.edit').click(function() {
    var id = $(this).attr('data-id');
    //console.log(id);
    $.ajax({
      url: "/admin/plan/"+id+"/edit",
      dataType:"json",
      success: function(data) {
          $('#name').val(data.result.name);
          $('#desc').val(data.result.desc);
          $('#price').val(data.result.price);
          $('#diff_dates').val(data.result.diff_dates);
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


@section('js_OLD')
  <script>
    $(document).ready(function(){
    $('#form').on('submit', function(event){
    event.preventDefault();
    var action_url='';
    var metoda = '';
    var id = $('#hidden_id').val();
    console.log(id);
    if(id == '') {
      // jak dodaje rekord
      action_url = "{{ route('admin.plan.store') }}";
      metoda = "POST";
      console.log(action_url);
      
    } else {
      // jak zmieniam rekord
      action_url = "/admin/plan/"+id;

      
      metoda = "PUT";
      
      console.log('ssss = '+ action_url+' PUT !!1');
    }

      $.ajax({
        url: action_url,
        method: metoda,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function(data)
        {
          var html='';
          if(data.errors) {
            html = '<div class="alert alert-danger" role="alert"></div>';
            for(var count=0; count < data.errors.length; count++) {
              html += '<p>' + data.errors[count] + '</p>';
            }
            html += '</div>';
          }
          if(data.success) {
            console.log(data.success);
            html = '<div class="alert alert-success" role="alert">'+ data.success +'</div>';
            $('#form')[0].reset();
            $('.dataTable').DataTable().ajax.reload();
          }
          $('#form_result').html(html);
        }

      });
      // chowam formularz
      $('#ModalCenter').modal("hide");
    
    
  });
  $('.guzik').click(function() {
    $('#ModalCenter').modal("show");
    $('#form')[0].reset();
    $('#hidden_id').val('');
  });
  $('.test').click(function() {
    var id = $(this).attr('data-id');
    console.log(id);

    $.ajax({
      url: "/admin/plan/"+id+"/edit",
      dataType:"json",
      success: function(data) {
          $('#name').val(data.result.name);
          $('#desc').val(data.result.desc);
          $('#price').val(data.result.price);
          $('#diff_dates').val(data.result.diff_dates);
          $('#hidden_id').val(data.result.id);
          $('#ModalCenter').modal('show');
      }

    });
  });

});
  </script>


<script>
  // if(state != '') {
      //   console.log('/admin/plan/'+state);
      //   $.ajax({
      //     data: $('#form').serialize(),
      //     url: '/admin/plan/'+state,
      //     type: "PUT",
      //     dataType: "json",
      //     success: function(data) {
      //       // chowam formularz
      //       $('#ModalCenter').modal("hide");
      //     },
      //     error: function(data) {
      //       console.log('Error', data);
      //     }
      //   });
      // }
</script>

@endsection

