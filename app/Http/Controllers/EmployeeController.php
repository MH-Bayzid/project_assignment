<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
   function employee(){
    $companies= Company::all();
    $employees= Employee::paginate(5);
    return view('admin.employee.list_employee',[
        'companies'=>$companies,
        'employees'=>$employees,
    ]);
   }
   function employee_store(Request $request){
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'website'=>'required',
        'logo'=>'required|max:512',
        'logo'=>'mimes:jpg,png,gif',
    ]);
    Employee::insert([
        'name'=>$request->name,
        'company_id'=>$request->company_id,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'created_at'=>Carbon::now(),
    ]);
    toast('Employee Added!','success');
    return back();
   }
   function delete_employee($employee_id){
        Employee::find($employee_id)->delete();
        toast('Employee Details Deleted!','info');
        return back();
        
   }
   function edit_employee($employee_id){
        $employee= Employee::find($employee_id);
        $companies= Company::all();
        return view('admin.employee.edit_employee',[
            'employee'=>$employee,
            'companies'=>$companies,
        ]);
   }
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