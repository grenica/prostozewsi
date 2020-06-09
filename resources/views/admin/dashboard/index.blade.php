@extends('layouts.back')

@section('content')
<div class="row">
   
   <!-- moja karta -->
   <div class="col-12">
     <div class="card">
       <div class="card-body">
         <table id="mytable" class="display table table-bordered table-hover dataTable">
   <thead>
       <tr>
           <th>Column 1</th>
           <th>Column 2</th>
       </tr>
   </thead>
   <tbody>
       <tr>
           <td>A</td>
           <td>B</td>
       </tr>
       <tr>
           <td>C</td>
           <td>D</td>
       </tr>
   </tbody>
</table>
       </div>
     </div>

   </div>
   <!-- moja karta -->
   <!-- /.col -->
 </div>

@endsection
