@extends('layouts.farmer')
@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <h4 class="one">Wcześniejsze zamówienia</h4>
            {{-- <button class="btn btn-info ml-auto" id="createNewBook">Create Book</button> --}}
        </div>
    </div>
    <br>
    <table id="dataTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Data</th>
            <th>Wartość</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

{{-- create/update book modal--}}
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="bookForm" name="bookForm" class="form-horizontal">
                    <input type="hidden" name="book_id" id="book_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Author</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="author" name="author"
                                   placeholder="Enter author name"
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </form>
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
            ajax: "{{ url('history') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'created_at', name: 'created_at'},
                {data: 'value', name: 'value'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
    </script>
@endsection
