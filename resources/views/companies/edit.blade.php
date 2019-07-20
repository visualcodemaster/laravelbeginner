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
    <div align="left">
        <a href="{{ route('companies.index') }}" class="btn btn-default">Back</a>
    </div>
    <br/>
    <div class="container">
        <form method="post" action="{{ route('companies.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="name" class="text-right"> Name</label>
                    <input type="text" name="name" id="name" value="{{ $data->name }}" class="form-control input-lg"/>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="name" class="text-right"> Email</label>
                    <input type="text" name="email" value="{{ $data->email }}" class="form-control input-lg"/>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="website" class="text-right">Website</label>
                    <input type="text" name="website" value="{{ $data->website }}" class="form-control input-lg"/>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="logo" class="text-right"> Logo</label>
                    <input type="file" name="logo" id="logo" value="{{url('storage')}}/{{$data->logo }}" />
                    <img src="{{url('storage')}}/{{$data->logo }}" class="img-thumbnail" width="100" />
                    <input type="hidden" name="hidden_image" value="{{$data->logo }}" />
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" name="edit" class="btn btn-primary input-lg pull-left" value="Update"/>
            </div>
        </form>
    </div>

    </div>
@endsection