@extends('layouts.farmer')

@section('content')
<div class="row">
   
   <!-- moja karta -->
   <div class="col-12">
     <div class="card">
       <div class="card-header">
         Panel rolnika
       </div>
       <div class="card-body">
         {{-- <h4 class="card-title">Title</h4>
         <p class="card-text">Text</p> --}}
         <h1>Dashboard</h1>

         @if ($articles->isEmpty())
       <a href="{{ route('farmer.article.create')}}" class="btn btn-primary">Wystaw swój pierwszy towar</a>
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
