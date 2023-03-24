<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    // employee list view
    function employee(){
        $companies= Company::all();
        $employees= Employee::paginate(5);
        return view('admin.employee.list_employee',[
            'companies'=>$companies,
            'employees'=>$employees,
        ]);
   }
    // employee data insert   
   function employee_store(Request $request){
    // validation
    $request->validate([
        'name'=>'required',
        'company_id'=>'required',
        'email'=>'required|email',
        'phone'=>'required',
    ]);
    Employee::insert([
        'name'=>$request->name,
        'company_id'=>$request->company_id,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'created_at'=>Carbon::now(),
    ]);
    
    return back()->withSuccess('Employee details Added!');
   }
    // employee details delete   
   function delete_employee($employee_id){
        Employee::find($employee_id)->delete();
        toast('Employee Details Deleted!','info');
        return back();
        
   }
    // employee details edit view   
   function edit_employee($employee_id){
        $employee= Employee::find($employee_id);
        $companies= Company::all();
        return view('admin.employee.edit_employee',[
            'employee'=>$employee,
            'companies'=>$companies,
        ]);
   }
   // employee details update
   function employee_update(Request $request){
        Employee::find($request->employee_id)->update([
            'name'=>$request->name,
            'company_id'=>$request->company_id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now(),
        ]);
        toast('Employee Details Updated','success');
        return back();
   }
}
