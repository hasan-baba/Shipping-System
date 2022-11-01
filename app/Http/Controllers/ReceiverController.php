<?php

namespace App\Http\Controllers;

use App\Models\Receiver;
use Illuminate\Http\Request;

class ReceiverController extends Controller
{
    public function list() {
        $receivers = Receiver::orderBy('receiver_name')->get();
        return view('receiver.list', ['receivers' => $receivers]);
    }
    public function store(Request $request) {
        $receivers = new Receiver;
        $receivers->receiver_code = $request->input('receiverCode');
        $receivers->receiver_name = $request->input('receiverName');
        $receivers->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully'
        ]);
    }
    public function edit($id) {
        $receivers = Receiver::findOrFail($id);
        return response()->json([
            'receiver' => $receivers
        ]);
    }
    public function update(Request $request, $id) {
        $receivers = Receiver::findOrFail($id);
        $receivers->receiver_name = $request->input('receiver_name');
        $receivers->receiver_code = $request->input('receiver_code');
        $receivers->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $receivers = Receiver::findOrFail($id);
        $receivers->delete();
        return response()->json(['status' => 'Receiver Deleted Successfully!']);
    }
}
