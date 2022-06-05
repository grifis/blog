<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;

class WeatherController extends Controller
{
    public function index_rainy(Weather $weather)
    {
        $posts=$weather->posts()->get();
        return view('rainy')->with(['weather' => $weather, 'posts' => $posts]);
    }
    
    public function index_sunny(Weather $weather)
    {
        $posts=$weather->posts()->get();
        return view('sunny')->with(['weather' => $weather, 'posts' => $posts]);
    }
    
    public function create_rainy(Weather $weather)
    {
        return view('create_rainy')->with(['weather' => $weather]);
    }
    
    public function create_sunny(Weather $weather)
    {
        return view('create_sunny')->with(['weather' => $weather]);
    }
}
