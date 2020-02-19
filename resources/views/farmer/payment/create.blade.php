@extends('layouts.farmer')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Cennik</h1>
  <p class="lead">Wybierz plan płatności</p>
</div>
<div class="container">
  <div class="card-deck mb-3 text-center">
    @foreach ($plans as $plan)
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">{{$plan->name}}</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">{{$plan->price}} zł<small class="text-muted">/ m-c</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            {{$plan->desc }}
          </ul>
          {!! Form::open(array('route'=>'farmer.payment.store')) !!}
          {!! Form::hidden('plan_id', $plan->id ) !!}
          <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Zapisz</button>
          {!! Form::close() !!}
        </div>
        
      </div>
    @endforeach
    <!-- <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Pro</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>20 users included</li>
          <li>10 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
      </div>
    </div> -->
    <!-- <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Enterprise</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>30 users included</li>
          <li>15 GB of storage</li>
          <li>Phone and email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
      </div>
    </div> -->
  </div>

  
</div>

@endsection