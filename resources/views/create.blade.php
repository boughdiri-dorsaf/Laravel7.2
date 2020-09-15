@extends('layouts/app')
@section('title')
    Create New Car
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center pt-3 pb-3 border-bottom">
         <h2>Create a new car</h2>
    </div>
    {{--  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif  --}}
    <form  class="mt-3" action="{{route('cars.store')}}" method="post">
        @csrf
        <div class="row form-group">
            <div class="col-md-12">
                <label for="make">Make : </label>
                <input type="text" name="make" class="form-control @if($errors->has('make')) is-invalid @endif" value=" {{ old('make') }}">
                @if ($errors->has('make'))
                    <span class="text-danger">{{ $errors->first() }}</span>
                @endif
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="model">Model : </label>
                <input type="text" class="form-control @if($errors->has('model')) is-invalid @endif" name="model" value=" {{ old('model') }}">
                @if ($errors->has('model'))
                    <span class="text-danger">{{ $errors->first() }}</span>
                @endif
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="produced_on">Produced on : </label>
                <input type="date" class="form-control @if($errors->has('produced_on')) is-invalid @endif" name="produced_on" value=" {{ old('produced_on') }}">
                @if ($errors->has('produced_on'))
                    <span class="text-danger">{{ $errors->first() }}</span>
                @endif
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success w-50 float-right">Create</button>
            </div>
        </div>
    </form>
@endsection
