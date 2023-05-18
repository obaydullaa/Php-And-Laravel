<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getWeather($city=null)
    {
        if(!$city) {
            return "Please mention a city.";
        }
        return "Weather In {$city} is Good.";
    }
}
