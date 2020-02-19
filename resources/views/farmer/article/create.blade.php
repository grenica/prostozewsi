@extends('layouts.back')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dodaj nowy towar</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(array('route'=>'farmer.article.store')) !!}
                        @include('farmer.article._form')
                        {{-- {!! Form::hidden('plan_id', $plan->id ) !!} --}}
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

<!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Wybierz kategorię</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form">
          <div class="modal-body">
              <div id="wynik">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {{-- <button type="submit" class="btn btn-primary">Zapisz</button> --}}
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

  $("#category").click(function() {
      console.log("ma być ajax");
      $.ajax({
          url: "{{ route('ajax_cat')}}",
          type: "GET",
          dataType: "json",
          success: function(data) {
            $('#ModalCenter').modal("show");
            $("#wynik").empty();
            var html='';
            console.log(data);
            $.each(data, function(index,value){
                $.each(value, function(key,v){
                    //console.log(key +': '+ v.name);
                    if(v.children.length >0) {
                      haschildren = 1;
                    } else {
                      haschildren = 0;
                    }
                    html+='<div data-id='+v.id+' data-haschilden='+haschildren+' class="pos">'+v.name+'</div>';
                });
            });
           $("#wynik").append(html);
            
          }
      });
  }); 

  $(document).on("click",".pos",function() {
     // console.log("To jestsem");
        $("#category_container").empty();

        child = $(this).attr("data-haschilden");
        id = $(this).attr("data-id");
        t = $(this).text();
        // console.log(child);
        // console.log(t);
        // console.log(id)
        if(child==0) {
            // nie ma dzieci
            $("#category_container").append("<div>"+t+"</div>");
            $('#ModalCenter').modal("hide");
            $("#category_id").val(id);
           
        } else {
            $.ajax({
            url: "/ajax_cat_detail/"+id,
            type: "GET",
            dataType: "json",
            success: function(data) {
             // $('#ModalCenter').modal("show");
              $("#wynik").empty();
              var html='';
              console.log(data);
              $.each(data, function(index,value){
                  $.each(value, function(key,v){
                      console.log(key +': '+ v.name);
                      if(v.children.length >0) {
                      haschildren = 1;
                    } else {
                      haschildren = 0;
                    }
                      html+='<div data-id='+v.id+' data-haschilden='+haschildren+' class="pos">'+v.name+'</div>';
                      
                  });
              });
            $("#wynik").append(html);
                
            }
        });
        }
  });
      
    //   console.log("ma być POS");
    //   child = $(this).attr("data-haschilden");
    //   console.log(child);
    // 
    //   $.ajax({
    //       url: "{{ route('ajax_cat')}}",
    //       type: "GET",
    //       dataType: "json",
    //       success: function(data) {
    //         $('#ModalCenter').modal("show");
    //         $("#wynik").empty();
    //         var html='';
    //         console.log(data);
    //         $.each(data, function(index,value){
    //             $.each(value, function(key,v){
    //                 //console.log(key +': '+ v.name);
    //                 html+='<div data-id='+v.id+' class="pos">'+v.name+'</div>';
    //             });
    //         });
    //        $("#wynik").append(html);
            
    //       }
    //   });
//   }); 


});
</script>
@endsection
