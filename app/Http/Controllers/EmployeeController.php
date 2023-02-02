<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = employee::all();
        return $employees;
    }

    public function store(Request $request)
    {
        $employee = employee::create([
             'first_name'=>$request->first_name,
             'last_name'=>$request->last_name,
             'email'=>$request->email,
            'phone'=>$request->phone,
            'company_id'=>$request->company_id,

        ]);
          return response()->json([
            'message' => 'Employee Added Successfully',
        ]);
    }


    public function show(employee $employee)
    {
         return response()->json([
            'employee' => $employee,
        ]);

    }

    public function update(Request $request, employee $employee)
    {
         $employee->update($request->all());
        return response()->json([
            'message' => 'Employee Data Updated',
        ]);
    }


    public function destroy(employee $employee)
    {
     $employee->delete();
        return response()->json([
            'message' => 'Employee Deleted Successfully',
        ]);
    }
}
