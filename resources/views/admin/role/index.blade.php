@extends('layouts.back')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  Role użytkowników
                </div>
                <div class="card-body">
                  <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                                <tr>
                                <td>{{$role->id }}</td>
                                <td>{{$role->name }}</td>
                                <td>
                                    <div class="float-right">
                                        
                                <a class="btn btn-outline-info edit" data-id="{{ $role->id }}"><i class="icofont-ui-edit"></i></a>                               
                                {!! Form::model($role,array('route'=>['admin.roles.destroy',$role],'method'=>'DELETE','class'=>'d-inline')) !!}
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



