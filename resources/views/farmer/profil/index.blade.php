@extends('layouts.farmer')

@section('content')
<div class="row">
   
   <!-- moja karta -->
   <div class="col-12">
     <div class="card">
       <div class="card-header">
         Profil rolnika
       </div>
       <div class="card-body">
         {{-- <h4 class="card-title">Title</h4>
         <p class="card-text">Text</p> --}}
         @if ($farmer->markets->isEmpty())
          <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Doskonale!</h4>
            <p>To już wszystko co potrzebowaliśmy</p>
            <hr>
            <p class="mb-0">Aby twoi klienci mogli zamawiać Państwa produkty należy jeszcze wskazać miejsce(a) dokonania tranzakcji</p>
          <a href="{{route('farmer.market.create')}}" class="btn btn-primary">Chcę wskazać rynek</a>
          </div>
         @else
         <div class="account">
           <h5>użytkownik: <span>{{$farmer->user->name}}</span></h5>
         </div>
         <div class="infouser">
           <div class="image">
             <img src="{{ asset('/storage/rolnicy/'.$farmer->image.'.webp') }}"/>
           </div>
           <div class="info container">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <h4>Nazwa</h4><p>{{$farmer->name}}</p>
                </div>
                <div class="col-12 col-sm-4">
                  <h4>Miejscowość</h4><p>{{$farmer->city}}</p>
                </div>
                <div class="col-12 col-sm-4">
                  <h4>Telefon</h4><p>{{$farmer->phone}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-sm-4">
                  <h4>Lat:</h4><p>{{$farmer->lat}}</p>
                </div>
                <div class="col-12 col-sm-4">
                  <h4>Lot:</h4><p>{{$farmer->lot}}</p>
                </div>
                <div class="col-12 col-sm-4">
                  <h4>Województwo:</h4><p>{{$farmer->region->name}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <a href="{{ route('farmer.profil.edit',[$farmer->id])}}" class="btn btn-primary">Zmień dane</a>
                </div>
              </div>
           </div>
         </div>
        @endif
       </div>
       {{-- <div class="card-footer text-muted">
         Footer
       </div> --}}
     </div>

   </div>

   <!-- moja karta -->
   <!-- /.col -->
 </div>

@endsection
