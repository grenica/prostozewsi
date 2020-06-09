@extends('layouts.back')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Rolnik</a>
                </li>
                {{-- <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                </li> --}}
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div>
                    <div><p>Nazwa: <span class="strong">{{$farmer->name}}</span></p></div>
                    <div><p>tel: <span class="strong">{{$farmer->phone}}</span></p></div>
                    <div><p>Miejscowość: <span class="strong">{{$farmer->city}} {{$farmer->numer}}</span></p></div>
                    <div><p>Województwo: <span class="strong">{{$farmer->region->name}}</span></p></div>
                    <div><p>User: <span class="strong">{{$farmer->user->name}}</span></p></div>
                    <div><p>Email: <span class="strong">{{$farmer->user->email}}</span></p></div>
                    </div>
                    <img src="{{ $farmer->image }}" alt="">
                    @if ($active == true)
                        <h1 class="badge badge-pill badge-success">Aktywny</h1>
                    @else
                        <h1 class="badge  badge-pill badge-danger"><i class="icofont-not-allowed"></i> Nie aktywny</h1>
                    @endif
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">dsfsdfsd</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">greno</div>
              </div>
        </div>
  
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  Towary
                </div>
                <div class="card-body">
                  <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Cena</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                                <tr>
                                <td>{{$article->name }}</td>
                                <td>{{$article->price }} zł</td>
                                <td>
                                    <div class="float-right">
                                        
                                <a class="btn btn-outline-info edit" data-id="{{ $article->id }}"><i class="icofont-ui-edit"></i></a>                               
                                {!! Form::model($article,array('route'=>['admin.farmer.destroy',$article],'method'=>'DELETE','class'=>'d-inline')) !!}
                                {!! Form::button('<i class="icofont-ui-delete"></i>',['type'=>'submit','class'=>'btn btn-sm btn-outline-danger  clearfix'])  !!}
                                {!! Form::close() !!}
                                    </div>
                                </td>
                                </tr>
                         @endforeach
                    </tbody>
                </table>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection



