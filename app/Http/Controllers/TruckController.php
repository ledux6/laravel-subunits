<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\SubUnit;

class TruckController extends Controller
{
    public function index() 
    {
        return view("main", ['trucks' => Truck::all(), 'subUnits' => SubUnit::all()]);
    }

    public function get(int $id) {
        $truck = Truck::whereId($id)->first();

        return view('truck', ['truck'=> $truck]);
    }

    public function update(Request $request, int $id) {
        Truck::whereId($id)
            ->update([
                'unit_number' => $request->all()['unit_number'],
                'year' => $request->all()['year'],
                'notes' => $request->all()['notes'],
            ]);

        return redirect()->action([self::class,'index'])->with('success','');
    }

    public function delete(int $id) {
        Truck::whereId($id)->delete();

        return redirect()->action([self::class,'index'])->with('success','');
    }

    public function create(Request $request) {
        $truck = Truck::create([
            'unit_number' => $request->all()['unit_number'],
            'year' => $request->all()['year'],
            'notes' => $request->all()['notes'],
        ])
        ->save();

        return redirect()->action([self::class,'index'])->with('success','');
    }
}
