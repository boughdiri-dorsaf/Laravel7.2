<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    /**
        *method that shows all the cars
    */
    public function index(){

        $cars = Car::paginate(request('perPage', 5));

        return view('index',['cars' => $cars]);
    }

    /**
        *method redirect us to the create new car page
    */
    public function create(){
        return view('create');
    }

    /**
        *method store a new car
    */
    public function store(Request $request){
        $request->validate([
            'make' => 'required|min:3|max:10',
            'model' => 'required|min:3|max:10',
            'produced_on' => 'required'
        ]);

        Car::create($request->all());

        $request->session()->flash('status','Car was successfully added !');

        return redirect()->route('cars.index');
    }

    /**
        *method that redirect us to the editing page
    */
    public function edit($car_id){

        $car = Car::findOrFail($car_id);

        return view('edit',[
            'car' => $car
        ]);

    }

    /**
        *method that update the car information
    */
    public function update($car_id){

        $car = Car::findOrFail($car_id);

        $car->make = request()->input('make');
        $car->model = request()->input('model');
        $car->produced_on = request()->input('produced_on');

        $car->update();

        return redirect()->route('cars.index');

    }

    /**
        *method that delete the car
    */
    public function delete($car_id){

        Car::destroy($car_id);

        return redirect()->route('cars.index');

    }


}
