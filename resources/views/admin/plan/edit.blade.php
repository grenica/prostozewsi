@extends('layouts.back')

@section('starter')
  Kategorie JM
@endsection

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
                   {!! Form::model($plans, ['route' => ['plan.update', $plans->id], 'method' => 'put']) !!}
                        @include('admin.plan._form')
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