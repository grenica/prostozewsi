@extends('layouts.farmer')

@section('content')
  <div class="row">
    <div class="col-3">
        <div class="card text-white bg-info border-0 gradient1">
          <div class="card-body d-flex justify-content-between align-items-center">
            <div>
              <p class="card-text">Nowe Zamówienia</p>
            {{-- <h4 class="card-title">{{ $lastEarn->countOrders}} / {{$lastEarn->lastEarn }} zł</h4> --}}
            </div>
             <i class="icofont-money icofont-4x"></i>
          </div>
        </div>
    </div>
    <div class="col-3">
      <div class="card text-white bg-info border-0 gradient2">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <p class="card-text">klienci</p>
          <h4 class="card-title">{{ $allClients }}</h4>
          </div>
           <i class="icofont-users-alt-4 icofont-4x"></i>
        </div>
      </div>
  </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          Bestsellery
        </div>
        <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Data</th>
                <th>Wartość</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('panel') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'Ilosc', name: 'Ilosc'},
                // {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
    </script>
@endsection