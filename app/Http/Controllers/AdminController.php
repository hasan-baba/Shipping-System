<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $trips = Trip::with('ship', 'cargo', 'port')->whereMonth('created_at', Carbon::now()->month)->get();
        return view('admin.list', [
            'trips' => $trips
        ]);
    }
    public function list() {
        $users = User::all();
        return view('admin.user', [
            'users' => $users
        ]);
    }
    public function store(Request $request) {
        $user = new User;
        $user->name = $request->input('user');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully'
        ]);
    }
    public function edit($id) {
        $user = User::findOrFail($id);
        return response()->json([
            'user' => $user
        ]);
    }
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->input('editUser');
        $user->email = $request->input('editEmail');
        $user->password = Hash::make($request->input('editPassword'));
        $user->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        $current_user = auth()->user()->name;
        if($current_user == $user->name) {
            return response()->json([
                'status' => 500,
                'message' => 'You are currently logged in!'
            ]);
        } else {
            $user->delete();
            return response()->json([
                'status' => 200,
                'message' => 'User Deleted Successfully!'
            ]);
        }
    }
}
