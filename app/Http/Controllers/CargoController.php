<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function list() {
        $cargos = Cargo::orderBy('cargo_name')->get();
        return view('cargo.list', ['cargos' => $cargos]);
    }
    public function store(Request $request) {
        $cargos = new Cargo;
        $cargos->cargo_name = $request->input('cargoName');
        $cargos->cargo_arabic_name = $request->input('cargoArabicName');
        $cargos->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully',
            'id' => $cargos->id,
            'cargo_name' => $request->input('cargoName')
        ]);
    }
    public function edit($id) {
        $cargos = Cargo::findOrFail($id);
        return response()->json([
            'cargo' => $cargos
        ]);
    }
    public function update(Request $request, $id) {
        $cargos = Cargo::findOrFail($id);
        $cargos->cargo_name = $request->input('cargo_name');
        $cargos->cargo_arabic_name = $request->input('cargo_arabic_name');
        $cargos->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $cargos = Cargo::findOrFail($id);
        $cargos->delete();
        return response()->json(['status' => 'Cargo Deleted Successfully!']);
    }
}
