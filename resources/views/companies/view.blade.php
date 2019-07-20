@extends('layouts.master')

@section('content')

    <div class="jumbotron text-center">
        <div align="right">
            <a href="{{ route('companies.index') }}" class="btn btn-default">Back</a>
        </div>
        <br/>

        <h3><img src="{{url('storage')}}/{{$data->logo }}" class="img-thumbnail" width="100"/></h3>
        <h3>Name - {{ $data->name }} </h3>
        <h3>Email - {{ $data->email }}</h3>
        <h3>Website - {{ $data->website }}</h3>
    </div>
@endsection