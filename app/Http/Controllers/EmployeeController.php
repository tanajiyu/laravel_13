<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Position;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Employee::all();
        $data = Employee::paginate(5);
        return view('employee.home',[
            'data'=>$data
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Position::all();
        return view('employee.create',[
            'position'=>$position
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:App\Employee,name|min:5',
            'alamat'    => 'required|min:15|max:255',
            'phone'     => 'required|unique:App\Employee,phone',
            'email'     => 'required|email:rfc,dns'
        ]);

        // penamaan file
        $filename = 'employee-'.$request->name.'-'.$request->id.time().'.png';

        // store ke server
        $request->file('picture')->storeAs('public/employee', $filename);

        Employee::create([
            'name'          => $request->name,
            'alamat'        => $request->alamat,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'position_id'   => $request->position_id,
            'picture'       => $filename
        ]);

        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Employee::where('id','=',$id)->first();
        return view('employee.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Employee::where('id','=',$id)->first();
        $position = Position::all();
        return view('employee.edit', [
            'data' => $data,
            'position' => $position
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->picture) {
            // penamaan file
            $filename = 'employee-'.$request->name.'-'.$request->id.time().'.png';

            // storage ke server
            $request->file('picture')->storeAs('public/employee', $filename);

            $employee = Employee::where('id','=',$request->id)->first();
            Storage::delete('public/employee/'.$employee->picture);

            // dd($employee->picture);

            Employee::where('id','=', $request->id)->update([
                'name'          => $request->name,
                'alamat'        => $request->alamat,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'position_id'   => $request->position_id,
                'picture'       => $filename
            ]);
        } else {
            Employee::where('id','=', $request->id)->update([
                'name'          => $request->name,
                'alamat'        => $request->alamat,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'position_id'   => $request->position_id
            ]);
        }
        
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Employee::destroy($id);
        $data = Employee::find($id);

        // menggunakan SoftDeletes
        // $data->delete();

        // menggunakan softdelete namun data dipaksa dibuang
        $employee = Employee::where('id','=',$id)->first();
        Storage::delete('public/employee/'.$employee->picture);
        $data->forceDelete();

        return redirect('/employee');
    }
}
