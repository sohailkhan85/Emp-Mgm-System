<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Country;
use App\Models\Department;

class EmpController extends Controller
{
    
    public function emp_create()
    {   
        $countries = Country::all(); // For Countries List
        $depts = Department::all(); // For Dept List

        $employee= new Employee;
        $title="Add Employee";
        $url= url('/emp_create');
        $data=compact('url', 'title','employee','countries','depts');
        return view('emp-create')->with($data);
    }
    public function emp_create_post(Request $request)
    {   
        
        $request->validate(
            [
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
                //'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',

            ]
        );
        

        $Emp = new Employee;

        $Emp->firstName     =   $request['firstName'];
        $Emp->lastName      =   $request['lastName'];
        $Emp->email         =   $request['email'];
        $Emp->dob           =   $request['dob'];
        $Emp->address       =   $request['address'];
        $Emp->gender        =   $request['gender'];
        $Emp->familyStatus  =   $request['familyStatus'];
        $Emp->airTicket     =   $request['airTicket'];
        $Emp->jobType       =   $request['jobType'];
        $Emp->designation   =   $request['designation'];
        $Emp->qualification =   $request['qualification'];
        $Emp->joiningDate   =   $request['joiningDate'];
        $Emp->basicSalary   =   $request['basicSalary'];
        $Emp->allowances    =   $request['allowances'];
        $Emp->country       =   $request['country'];
        $Emp->dept          =   $request['dept'];
        $Emp->serviceStatus =   $request['serviceStatus'];
        $Emp->gratuity      =   $request['gratuity'];
        
        if($request['image'] != '')
        {
            $imageName          =   time().'Emp'.'.'.$request['image']->getClientOriginalExtension();
            $imagePath          =   $request['image']->storeAs('public/uploads', $imageName);
            $Emp->imageName     =   $imageName;
            $Emp->imagePath     =   $imagePath;
        }
        

        $Emp->save();

        return redirect('emp_view')->with('success', 'Employee Added Successfully.');
    }
    
    public function emp_edit($id)
    {   
        $countries = Country::all(); // For Countries List
        $depts = Department::all(); // For Dept List

        $employee= Employee::find($id);
        $title="Update Employee";
        $url= url('/emp_update').'/'.$id;
        $data=compact('url', 'title','employee','countries','depts');
        return view('emp-create')->with($data);
    }
    public function emp_update(Request $request, $id)
    {   
        
        $request->validate(
            [
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
                //'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',

            ]
        );
        

        $Emp =Employee::find($id);

        $Emp->firstName     =   $request['firstName'];
        $Emp->lastName      =   $request['lastName'];
        $Emp->email         =   $request['email'];
        $Emp->dob           =   $request['dob'];
        $Emp->address       =   $request['address'];
        $Emp->gender        =   $request['gender'];
        $Emp->familyStatus  =   $request['familyStatus'];
        $Emp->airTicket     =   $request['airTicket'];
        $Emp->jobType       =   $request['jobType'];
        $Emp->designation   =   $request['designation'];
        $Emp->qualification =   $request['qualification'];
        $Emp->joiningDate   =   $request['joiningDate'];
        $Emp->basicSalary   =   $request['basicSalary'];
        $Emp->allowances    =   $request['allowances'];
        $Emp->country       =   $request['country'];
        $Emp->dept          =   $request['dept'];
        $Emp->serviceStatus =   $request['serviceStatus'];
        $Emp->gratuity      =   $request['gratuity'];
        
        if($request['image'] != '')
        {
            $imageName          =   time().'Emp'.'.'.$request['image']->getClientOriginalExtension();
            $imagePath          =   $request['image']->storeAs('public/uploads', $imageName);
            $Emp->imageName     =   $imageName;
            $Emp->imagePath     =   $imagePath;
        }
        

        $Emp->update();

        return redirect('emp_view')->with('success', 'Employee Updated Successfully.');
    }
    
    public function emp_view(Request $request) // Searching 
    {
        //echo "Inside";die;
      $search = $request['search'] ?? "";
        if($search !="")
        {

            $employees = Employee::where('firstname','LIKE', "%$search%")->orwhere('lastname','LIKE',"%$search%")->get();
   
        }
        else
        {
            $employees = Employee::paginate(10); // Select * from Employees (with pagination)
                
        }
        
        $data=compact('employees', 'search');
        return view('emp-view')->with($data);
    }

    public function singemp_view($id)
    {
        $Emp = Employee::find($id);

        $firstName = $Emp->firstName;
        $lastName = $Emp->lastName;
        $gender = $Emp->gender;
        $email = $Emp->email;
        $address = $Emp->address;
        $country = $Emp->country;
        $dept = $Emp->dept;
        $designation = $Emp->designation;
        $qualification = $Emp->qualification;
        $dob = $Emp->dob;
        $joiningDate = $Emp->joiningDate;
        $basicSalary = $Emp->basicSalary;
        $allowances = $Emp->allowances;
        $familyStatus = $Emp->familyStatus;
        $airTicket = $Emp->airTicket;
        $serviceStatus = $Emp->serviceStatus;
        $jobType = $Emp->jobType;
        $gratuity = $Emp->gratuity;
        $imageName = $Emp->imageName;

        $data = compact('Emp');

        return view('singemp_view')->with($data);
    }

    public function emp_delete($id)
    {
        $Emp = Employee::find($id);
        if(!is_null($Emp))
        {
            $Emp->delete();
        }
            

        return redirect('emp_view')->with('deleted', 'Student Deleted Successfully.');
    }

    
    public function emp_permdelete($id)
    {
        $Emp = Employee::onlyTrashed()->find($id);
        if(!is_null($Emp))
        {
            $Emp->forceDelete();
        }
            

        return redirect('emp_view')->with('deleted', 'Employee Deleted Successfully.');
    }
    public function emp_restore($id)
    {
        $Emp = Employee::onlyTrashed()->find($id);
        $Emp->restore();

        return redirect('emp_view')->with('restored', 'Employee Successfully Restored.');
    }

    public function trash_view()
    {
        $Emp = Employee::onlyTrashed()->get();
        $data = compact('Emp');

        return view('emp_trash')->with($data);
    }
}
