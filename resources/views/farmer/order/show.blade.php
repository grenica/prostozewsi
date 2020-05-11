@extends('layouts.farmer')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-12">
       <h1>Zamówienie {{$order->id}}</h1>

   </div>
 </div>
 <div class="row">
  <div class="col-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Data</th>
            <th>Atrykuł</th>
            <th>Klient</th>
            <th>Ilość</th>
            <th>Cena jedn.</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orderitems as $item)
          <tr>
          <td>{{$item->order->created_at}}</td>
          <td>{{$item->article->name}}</td>
          <td>{{$item->order->client->user->name}}</td>
          <td>{{$item->quantity}}</td>
          <td>{{$item->price}} zł</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <h2 class="w-100 float-right">Razem: {{$total}}</h2>
  </div>
 </div>

</div>
@endsection