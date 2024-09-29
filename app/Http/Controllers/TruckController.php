<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use Illuminate\Support\Facades\Validator;

class TruckController extends Controller
{
    public function get(int $id) {
        $truck = Truck::whereId($id)->first();

        return view('truck-edit', ['truck'=> $truck]);
    }

    public function update(Request $request, int $id) {
        $validator = Validator::make($request->all(),
        ['unit_number' => 'required', 'year' => 'required|integer|min:1900']);

        if ($validator->fails()) {
            return redirect()
                ->action([self::class, 'get', $id])
                ->withInput()
                ->withErrors($validator)
                ->withInput();
        }

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
        $validator = Validator::make($request->all(),
        ['unit_number' => 'required', 'year' => 'required|integer|min:1900']);

        if ($validator->fails()) {
            return redirect()
                ->action([self::class, 'create'])
                ->withInput()
                ->withErrors($validator)
                ->withInput();
        }

        $truck = Truck::create([
            'unit_number' => $request->all()['unit_number'],
            'year' => $request->all()['year'],
            'notes' => $request->all()['notes'],
        ])
        ->save();

        return redirect()->action([self::class,'index'])->with('success','');
    }
}
