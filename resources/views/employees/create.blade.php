@extends('layouts.master')
@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div align="left">
            <a href="{{ route('employees.index') }}" class="btn btn-default">Back</a>
        </div>
        <div class="row">
            <form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">

                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" name="first_name" class="form-control input-lg" placeholder="First Name"/>

                    </div>
                    <div class="col">
                        <input type="text" name="last_name" class="form-control input-lg" placeholder="Last Name"/>
                    </div>
                    <div class="col">
                        <input type="text" name="email" class="form-control input-lg" placeholder="Email"/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" name="phone" class="form-control input-lg" placeholder="Phone"/>
                    </div>
                    <div class="col">
                        <select class="custom-select custom-select" name="company" id="company">
                            <option>Select Your Company</option>
                            @foreach($companies as $company)
                                <option value="{{$company['id']}}">{{$company['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="submit" name="add" class="btn btn-primary input-lg" value="Add"/>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
