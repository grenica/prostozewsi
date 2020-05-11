@extends('layouts.farmer')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-12">
      <h1>Zamówienia</h1>
    </div>
    </div>
    <div class="row">
      <div class="col-12">
        
          
             
            <!--<p class="card-text">Text</p> -->
            
            {{-- <a class="btn guzik" data-toggle="modal">
                <i class="icofont-plus-circle icofont-2x"></i>
            </a> --}}
            

            @if ($orders->isEmpty())
                <div class="alert alert-danger" role="alert">
                    Żaden klient jeszcze nie zamówił
                </div>
            @else
            <div class="list-group">
              @foreach ($orders_report as $raport)
            <a href="#" class="list-group-item list-group-item-action">{{$raport->name}} <span class="badge badge-primary">{{$raport->total_quantity}} {{$raport->unit}}</span></a>
              @endforeach
            </div>

                    <table class="display table table-bordered table-hover dataTable">
                       <thead>
                           <tr>
                               <th>ID zam.</th>
                               <th>Wartość</th>
                               <th>Data zamówienia</th>
                               <th>Opcje</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                <td><a href="{{route('farmer.order.show',$order->id)}}">{{$order->id }}</a></td>
                                <td>{{$order->value}}</td>
                                {{-- <td>{{$order->created_at }}</td> --}}
                                <td>{{\Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</td>
                                
                                {{-- <td>
                                    <div class="float-right">
                                        
                                <a class="btn btn-outline-info edit" data-id="{{ $market->id }}"><i class="icofont-ui-edit"></i></a>                               
                                {!! Form::model($market,array('route'=>['farmer.market.destroy',$market],'method'=>'DELETE','class'=>'d-inline')) !!}
                                {!! Form::button('<i class="icofont-ui-delete"></i>',['type'=>'submit','class'=>'btn btn-sm btn-outline-danger  clearfix'])  !!}
                                {!! Form::close() !!}
                                    </div>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            @endif 
      </div>
    </div>
</div>

{{-- <!-- Modal -->
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
        @include('farmer.market._form')
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
      url: "/farmer/market/"+id+"/edit",
      dataType:"json",
      success: function(data) {
          $('#marker_id').val(data.result.marker_id);
          
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

@endsection

