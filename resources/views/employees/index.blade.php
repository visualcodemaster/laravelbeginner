@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row">
    <a class="nav-link" href="{{route('employees.create')}}">Add New</a>
  </div>
  
  <table class="table table-bordered table-striped">
 <tr>
  
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>  
  <th>Phone</th>  
  <th >Company</th>
  <th >Action</th>
 </tr>
 @foreach($employees as $row)
  <tr>
   
   <td>{{ $row->first_name }}</td>
   <td>{{ $row->last_name }}</td>
   <td>{{ $row->email }}</td>
   <td>{{ $row->phone }}</td>
   <td>{{ $row->company->name }}</td>
   <td>
    <form action="{{ route('employees.destroy', $row->id) }}" method="post">
          <a href="{{ route('employees.show', $row->id) }}" class="btn btn-primary">Show</a>
          <a href="{{ route('employees.edit', $row->id) }}" class="btn btn-warning">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
   </td>
  </tr>
 @endforeach
</table>
{!! $employees->links() !!}

</div>
@stop