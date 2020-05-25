@extends('layouts.back')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  Płatności
                </div>
                <div class="card-body">
                  <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data końcowa</th>
                        <th>Zysk</th>
                        <th>Rolnik</th>
                        <th>Opł.</th>
                        
                        {{-- <th>Woj.</th> --}}
                        <th>Data dodania</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.payment.index') }}",
            columns: [
                // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'id', name: 'id'},
                {data: 'stopdata', name: 'stopdata'},
                {data: 'price', name: 'price'},
                {data: 'farmer', name: 'farmer'},
                {data: 'ispaid', name: 'ispaid'},
                
                {data: 'created_at', name: 'created_at'},
                // {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
});
</script>
@endsection

