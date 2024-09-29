<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\SubUnit;

class MainController extends Controller
{
    public function index() 
    {
        return view("main", ['trucks' => Truck::all(), 'subUnits' => SubUnit::all()]);
    }
}
