@extends('layouts.master')

@section('content')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('employees.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 <h3>First Name - {{ $data->first_name }} </h3>
 <h3>Last Name - {{ $data->last_name }} </h3>
 <h3>Company - {{ $data->company_id }} </h3>
 <h3>Email - {{ $data->email }}</h3>
 <h3>Phone - {{ $data->phone }}</h3>
</div>
@endsection