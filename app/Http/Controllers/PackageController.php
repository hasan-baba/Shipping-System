<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function list() {
        $packages = Package::orderBy('package_name')->get();
        return view('package.list', ['packages' => $packages]);
    }
    public function store(Request $request) {
        $packages = new Package;
        $packages->package_name = $request->input('packageName');
        $packages->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully',
            'id' => $packages->id,
            'package_name' => $request->input('packageName')
        ]);
    }
    public function edit($id) {
        $packages = Package::findOrFail($id);
        return response()->json([
            'package' => $packages
        ]);
    }
    public function update(Request $request, $id) {
        $packages = Package::findOrFail($id);
        $packages->package_name = $request->input('package_name');
        $packages->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $packages = Package::findOrFail($id);
        $packages->delete();
        return response()->json(['status' => 'Package Deleted Successfully!']);
    }
}
