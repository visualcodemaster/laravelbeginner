@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<a class="nav-link" href="{{route('companies.create')}}">Add New</a>
	</div>
	
	<table class="table table-bordered table-striped">
 <tr>
  
  <th>Logo</th>
  <th>Name</th>
  <th>Email</th>
  <th >Website</th>
  <th >Action</th>
 </tr>
 @foreach($companies as $row)
  <tr>
   <td><img src="{{url('storage')}}/{{$row->logo }}" class="img-thumbnail" width="100"/></td>
   <td>{{ $row->name }}</td>
   <td>{{ $row->email }}</td>
   <td>{{ $row->website }}</td>
   <td>
    <form action="{{ route('companies.destroy', $row->id) }}" method="post">
					<a href="{{ route('companies.show', $row->id) }}" class="btn btn-primary">Show</a>
					<a href="{{ route('companies.edit', $row->id) }}" class="btn btn-warning">Edit</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
   </td>
  </tr>
 @endforeach
</table>
{!! $companies->links() !!}

</div>
@stop