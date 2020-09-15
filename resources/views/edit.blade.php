@extends('layouts/app')
@section('title')
    Edit Car
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center pt-3 pb-3 border-bottom">
         <h2>Edit car {{ $car->make }}</h2>
    </div>
    <form action="{{ route('cars.update',['car'=>$car]) }}" method="post">
        @csrf
        <div class="row form-group">
            <div class="col-md-12">
                <label for="make">Make : </label>
                <input type="text" class="form-control" name="make" value="{{ $car->make }}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="model">Model : </label>
                <input type="text" class="form-control" name="model" value="{{ $car->model }}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="produced_on">Produced on : </label>
                <input type="date" class="form-control" name="produced_on" value="{{ $car->produced_on }}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-block btn-success">Update</button>
            </div>
        </div>
    </form>
@endsection
