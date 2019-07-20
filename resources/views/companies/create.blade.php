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
        <div align="right">
            <a href="{{ route('companies.index') }}" class="btn btn-default">Back</a>
        </div>
        <div class="row">
            <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">

                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" class="form-control input-lg" placeholder="Name"/>
                    </div>
                    <div class="col">
                        <input type="text" name="email" class="form-control input-lg" placeholder="Email"/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" name="website" class="form-control input-lg" placeholder="Website"/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="file" name="logo"/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="submit" name="add" class="btn btn-primary input-lg" value="Add New"/>
                    </div>
                </div>


        </div>

        </form>
    </div>

    </div>
@stop
