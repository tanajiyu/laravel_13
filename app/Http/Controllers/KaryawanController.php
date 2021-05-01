<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index() 
    {
        // return view('karyawan.home');
        $data = DB::table('karyawan')->get();

        return view('karyawan.home', [
            'data'=>$data
        ]);
    }

    public function create() 
    {
        return view('karyawan.create');
    }

    public function store(Request $request) 
    {
        $data = DB::table('karyawan')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan
        ]);

        return redirect('/karyawan');
    }

    public function edit($id)
    {
        $data = DB::table('karyawan')->where('id', '=', $id)->first();
        return view('karyawan.edit', [
            "data" => $data
        ]);
    }

    public function update(Request $req)
    {
        DB::table('karyawan')
            ->where('id', '=', $req->id)
            ->update([
                'nama' => $req->nama,
                'alamat' => $req->alamat,
                'jabatan' => $req->jabatan
            ]);
        return redirect('/karyawan');
    }

    public function destroy($id){
        DB::table('karyawan')->where('id', '=', $id)->delete();
        return redirect('/karyawan');
    }
}
