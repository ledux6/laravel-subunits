<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\SubUnit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SubUnitController extends Controller
{
    public function createOptions() {
        return view("subunit-create", ['trucks' => Truck::all()]);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'main_truck_id' => 'required',
            'sub_unit_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $validator->after(
            function($validator) use ($request) {
                if ($request->all()['main_truck_id'] === $request->all()['sub_unit_id']) {
                    $validator->errors()->add(
                        'sub_unit_id', "Main truck and sub unit must differ."
                    );
                }
                if ($request->all()["start_date"] > $request->all()["end_date"]) {
                    $validator->errors()->add(
                        "start_date", "Start date can't be later than end date."
                    );
                }
                $subUnit = DB::table('sub_units')
                    ->where('main_truck_id', $request->all()['main_truck_id'])
                    ->whereBetween(
                        'start_date', 
                        [ $request->all()['start_date'], 
                        $request->all()['end_date'] ]
                    )
                    ->orWhereBetween(
                        'end_date', 
                        [ $request->all()['start_date'], $request->all()['end_date'] ]
                    )->get();
                if ($subUnit->count() > 0) {
                    $validator->errors()->add(
                        "main_truck_id", "The truck already has a sub unit during these dates."
                    );
                }

                $subUnit = DB::table("sub_units")
                    ->where("sub_unit_id", $request->all()['sub_unit_id'])
                    ->whereBetween(
                        'start_date', 
                        [ $request->all()['start_date'], 
                        $request->all()['end_date'] ]
                    )
                    ->orWhereBetween(
                        'end_date', 
                        [ $request->all()['start_date'], $request->all()['end_date'] ]
                    )->get();
                if ($subUnit->count() > 0) {
                    $validator->errors()->add(
                        'sub_unit_id', 'The truck is already a sub unit during these dates.'
                    );
                }
            });
 
        if ($validator->fails()) {
            return redirect()
                ->action([SubUnitController::class, 'createOptions'])
                ->withInput()
                ->withErrors($validator)
                ->withInput();
        }

        $subUnit = SubUnit::create([
            'main_truck_id' => $request->all()['main_truck_id'],
            'sub_unit_id'=> $request->all()['sub_unit_id'],
            'start_date' => $request->all()['start_date'],
            'end_date' => $request->all()['end_date'],
        ]);

        return redirect()->action(action: [TruckController::class,'index'])->with('success','');
    }

    public function delete(int $id) {
        SubUnit::whereId($id)->delete();

        return redirect()->action([TruckController::class,'index'])->with('success','');
    }

    public function get(int $id) {
        $subUnit = SubUnit::whereId($id)->first();

        return view('subunit-edit', ['subunit'=> $subUnit, 'trucks' => Truck::all()]);
    }

    public function update(Request $request, int $id) {
        SubUnit::whereId($id)
            ->update([
                'main_truck_id' => $request->all()['main_truck_id'],
                'sub_unit_id'=> $request->all()['sub_unit_id'],
                'start_date' => $request->all()['start_date'],
                'end_date' => $request->all()['end_date'],
        ]);

        return redirect()->action(action: [TruckController::class,'index'])->with('success','');
    }
}
