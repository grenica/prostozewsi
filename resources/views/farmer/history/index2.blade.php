@extends('layouts.farmer')

@section('content')
 <div class="row justify-content-center">
   <div class="col-md-8">
     <div class="card">
       <div class="card-header">
         Header
       </div>
       <div class="card-body">
        <table class="table table-bordered data-table">

          <thead>
              <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th width="100px">Action</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
      </table>
       </div>
       <div class="card-footer text-muted">
         Footer
       </div>
     </div>
   </div>
 </div>   
@endsection

