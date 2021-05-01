<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;

class PositionApiController extends Controller
{
    public function index(){
        $data = Position::all();

        return response()->json([
            'code' => 200,
            'messsage' => 'Success!',
            'value' => $data
        ]);
    }

    public function create(Request $req){
        Position::create([
            'name'          => $req->name,
            'department_id' => $req->department_id
        ]);

        return response()->json([
            'code'      => 201,
            'message'   => 'Created!'
        ]);
    }

    public function edit(Request $req, $id){
        Position::where('id','=',$id)->update([
            'name'          =>$req->name,
            'department_id' =>$req->department_id
        ]);

        return response()->json([
            'code'      => 201,
            'message'   => 'Updated!'
        ]);
    }

    public function delete($id){
        Position::destroy($id);

        return response()->json([
            'code'      => 200,
            'message'   => 'Deleted!'
        ]);
    }
}
