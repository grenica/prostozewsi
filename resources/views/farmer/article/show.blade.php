@extends('layouts.farmer')

@section('content')
<div class="container">
  @if (!$images->isEmpty())
    <div class="row">
      @foreach ($images as $image)
        <div class="col-4">
          <form action="{{ route('farmer.artimages.destroy', $image->id)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit"><i class="icofont-ui-delete"></i></button>
            </form>
          <img src="{{asset('storage/produkty/thumbnail/'.$image->image.'.webp')}}" class="img-thumbnail rounded h-100">
        {{-- <a href="{{ route('farmer.artimages.destroy', $image->id)}}"><i class="icofont-ui-delete"></i></a> --}}
             
        </div>    
          @endforeach 
    </div>
  @endif
  
 <div class="row">
   <div class="col-12">
       @if ($article->articleimages->isEmpty())
       <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <h4>Dodaj zdjęcie twojego produktu</h4>
          <p>Pamiętaj !!! Klienci kupują oczami</p>
          
       <a href="{{ route('farmer.artimages.create',$article->id)}}" class="btn btn-primary btn-lg">Dodaj domyślne zdjęcie</a>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
       @endif
     <div class="card md-3">
        {{-- <img src="holder.js/100x180/" alt=""> --}}
        {{-- <img src="{{ Storage::disk('products')->url($article->articleimages->image) }}" alt=""> --}}
       <div class="card-body">
        {{-- @foreach ($images as $image)
          <img src="{{asset('storage/produkty/'.$image->image)}}" class="img-thumbnail">
        @endforeach  --}}
       <h4 class="card-title">{{$article->name}}</h4>
         {{-- <h6 class="card-subtitle text-muted">Subtitle</h6> --}}
         <a href="{{ route('farmer.artimages.create',$article->id)}}" class="btn btn-primary btn-lg">Dodaj zdjęcie</a>
       </div>
       <div class="card-body">
       <p class="card-text">{{ $article->desc }}</p>
       <a href="#" class="card-link">{{ $article->price }} zł/{{$article->unit->name}}</a>
         
       </div>
     </div>
   </div>
 </div>

</div>
@endsection