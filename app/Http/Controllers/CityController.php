<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index() {
        $cities = City::paginate(20);
//        $states = State::all();

//        foreach ($cities as $city) {
//            echo '<pre>';
//            print_r($city->state->country);
//            echo '</pre>';
//            die('d');
//        }



        return view('city.index')->withCities($cities);
    }
}
