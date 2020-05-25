@extends('layouts.back')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  Użytkownicy
                </div>
                <div class="card-body">
                  <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>User</th> --}}
                        <th>Nazwa</th>
                        <th>mail</th>
                        <th>Rola</th>
                        {{-- <th>Woj.</th> --}}
                        {{-- <th>Data dodania</th> --}}
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
            ajax: "{{ route('admin.user.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'users.name'},
                {data: 'email', name: 'users.email'},
                {data: 'action', name: 'action'},
                // {data: 'region_id', name: 'region_id'},
                // {data: 'created_at', name: 'created_at'},
                // {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
});
</script>
@endsection

