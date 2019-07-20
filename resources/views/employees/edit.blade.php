@extends('layouts.master')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <br/>
        <div class="row">
        <div align="left">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
        </div>
        </div>
        <br/>
        <div class="row">
            <form method="post" action="{{ route('employees.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')


                <div class="row">
                    <div class="col">
                        <input type="text" name="first_name" value="{{ $data->first_name }}"
                               class="form-control input-lg" placeholder="First Name"/>

                    </div>
                    <div class="col">
                        <input type="text" name="last_name" value="{{ $data->last_name }}" class="form-control input-lg"
                               placeholder="Last Name"/>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" name="email" value="{{ $data->email }}" class="form-control input-lg"
                               placeholder="Email"/>
                    </div>
                    <div class="col">
                        <input type="text" name="phone" value="{{ $data->phone }}" class="form-control input-lg"
                               placeholder="Phone"/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <select class="custom-select" name="company" id="company" >
                            @foreach($companies as $company)
                                <option value="{{$company['id']}}"  {{ $data->company_id == $company['id'] ? 'selected="selected"' : '' }}>{{$company['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection