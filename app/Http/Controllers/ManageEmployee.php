<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;

class ManageEmployee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = DB::select('select * from employee');
        return response()->json(['employee' =>$employee],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'othernames' => 'required|string',
            'email'=> 'required|string|unique:Employee',
            'date_of_birth'=> 'required|string',
            'state_id'=> 'required|string',
            'lga_id'=> 'required|string',
            'phone_number'=> 'required|string',
           
        ]);
        $employee=new Employee([
            'firstname' => $request->firstname,
            'othernames' => $request->othernames,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'state_id' => $request->state_id,
            'lga_id' => $request->lga_id,
            'phone_number' => $request->phone_number,
            
        ]);
        
        $employee->save();
        return response()->json(['message' => 'Employee Added Successfully'],200);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::where('id', $id)->first();;
        return response()->json(['employee' =>$employee],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $updateemployee = Employee::find($id);
        $updateemployee->firstname=$request->firstname;
        $updateemployee->othernames=$request->othernames;
        $updateemployee->email=$request->email;
        $updateemployee->phone_number=$request->phone_number;
        $updateemployee->date_of_birth=$request->date_of_birth;
        $updateemployee->state_id=$request->state_id;
        $updateemployee->lga_id=$request->lga_id;

        $updateemployee->save();
        return response()->json(['message' => 'Employee Record Updated Successfully'],200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Deleteemployee = Employee::find($id);
        $Deleteemployee->delete();
        
         return response()->json(['message' => 'Employee Deleted Successfully'],200);
    
    }
}
