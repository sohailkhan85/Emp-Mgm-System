<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;

class EmpController extends Controller
{

     /*
        Display a listing of the resource.
     */
    public function index()
    {
       
        $employees = Employee::all();

        if($employees->count() > 0)
        {
            return response()->json([
                'status' => 200,
                'employees' => $employees
            ], 200 );
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found.'
            ], 404 );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

                'firstName'=>'required',
                'lastName'=>'required',
                'email'=>'required|email',
                'dob'=>'required',
                'address'=>'required',
                'designation'=>'required',
                'qualification'=>'required',
                'joiningDate'=>'required',
                'basicSalary'=>'required',
                'allowances'=>'required',
                'country'=>'required',
                'dept'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422 );
        }
        else{

            $employees = Employee::create(
                [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'dob' => $request->dob,
                'address' => $request->address,
                'designation' => $request->designation,
                'qualification' => $request->qualification,
                'joiningDate' => $request->joiningDate,
                'basicSalary' => $request->basicSalary,
                'allowances' => $request->allowances,
                'country' => $request->country,
                'dept' => $request->dept,
                'familyStatus' => $request->familyStatus,
                'airTicket' => $request->airTicket,
                'serviceStatus' => $request->serviceStatus,
                'jobType' => $request->jobType,
                'gratuity' => $request->gratuity,
                ]
            );

            if($employees){
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Added Successfully'
                ],200);
            }
            else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went Wrong!'
                ],500);
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id, Employee $employee)
    {
        $employee= Employee::find($id);
        if($employee){

            return response()->json([
                    'status'=> 200,
                    'employee'=> $employee
            ],200);
        }
        else{
            
            return response()->json([
                    'status'=>404,
                    'message' => 'No Such Record is Found'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee= Employee::find($id);
        if($employee){

            return response()->json([
                    'status'=> 200,
                    'employee'=> $employee
            ],200);
        }
        else{
            
            return response()->json([
                    'status'=>'404',
                    'message' => 'No Such Record is Found'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[

                'firstName'=>'required',
                'lastName'=>'required',
                'email'=>'required|email',
                'dob'=>'required',
                'address'=>'required',
                'designation'=>'required',
                'qualification'=>'required',
                'joiningDate'=>'required',
                'basicSalary'=>'required',
                'allowances'=>'required',
                'country'=>'required',
                'dept'=>'required',
        ]);

    if($validator->fails())
    {
        return response()->json([
            'status' => 422,
            'error' => $validator->messages()
        ], 422 );
    }
    else{

        $employee = Employee::find($id);
        
        if($employee){

            $employee->update([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'dob' => $request->dob,
                'address' => $request->address,
                'designation' => $request->designation,
                'qualification' => $request->qualification,
                'joiningDate' => $request->joiningDate,
                'basicSalary' => $request->basicSalary,
                'allowances' => $request->allowances,
                'country' => $request->country,
                'dept' => $request->dept,
                'familyStatus' => $request->familyStatus,
                'airTicket' => $request->airTicket,
                'serviceStatus' => $request->serviceStatus,
                'jobType' => $request->jobType,
                'gratuity' => $request->gratuity,
            ]);
            
            return response()->json([
                'status' => 200,
                'message' => 'Employee Updated Successfully'
            ],200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Employee not found!'
            ],404);
        }
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $employee= Employee::find($id);
        if($employee)
        {
            $employee->delete();

            return response()->json([
                'status'=> 200,
                'message' => 'Employee Deleted Successfully'

            ], 200);
        }
        else{

            return response()->json([
                'status'=> 404,
                'message' => 'Employee Not Found!'
            ],404);
        }
    }

}
