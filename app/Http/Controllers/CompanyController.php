<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function list() {
        $companies = Company::orderBy('name')->get();
        return view(
            'company.list',
            ['companies' => $companies]
        );
    }
    public function store(Request $request) {
        $company = new Company();
        $company->name = $request->input('name');
        $company->country = $request->input('country');
        $company->address = $request->input('address');
        $company->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully',
            'id' => $company->id,
            'name' => $request->input('name')
        ]);
    }
    public function edit($id) {
        $company = Company::findOrFail($id);
        return response()->json([
            'company' => $company
        ]);
    }
    public function update(Request $request, $id) {
        $company = Company::findOrFail($id);
        $company->name = $request->input('name');
        $company->country = $request->input('country');
        $company->address = $request->input('address');
        $company->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->json(['status' => 'Company Deleted Successfully!']);
    }
}
