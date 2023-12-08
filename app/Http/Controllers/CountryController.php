<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index() {
        $countries = Country::paginate(10);
//        dd($countries);

//        echo '<pre>';
//        print_r($countries);
//        echo '</pre>';
//        die('d');
        return view('country.index')->withCountries($countries);
    }
}
