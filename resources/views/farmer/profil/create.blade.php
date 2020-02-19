@extends('layouts.farmer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Wpisz dane o sobie</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(array('route'=>'farmer.profil.store')) !!}
                        @include('farmer.profil._form')
                    {!! Form::close() !!}

                </div>
								
            </div>
        </div>
    </div>
</div>

@endsection