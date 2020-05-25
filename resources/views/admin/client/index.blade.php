@extends('layouts.back')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  Rolnicy
                </div>
                <div class="card-body">
                  <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>User</th> --}}
                        
                        <th>Miejscowosc</th>
                        <th>Tel</th>
                        {{-- <th>Tel</th> --}}
                        <th>User name</th>
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
            ajax: "{{ route('admin.clients.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                
                {data: 'city', name: 'city'},
                {data: 'phone', name: 'phone'},
                // {data: 'phone', name: 'phone'},
                {data: 'action', name: 'action'},
                {data: 'created_at', name: 'created_at'},
                // {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
});
</script>
@endsection

