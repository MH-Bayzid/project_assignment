<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    // company menu view
    function companies(){
        $companies= Company::paginate(5);
        return view('admin.company.list_company',[
            'companies'=>$companies,
        ]);
    }
    // company details insert into DB
    function company_store(Request $request){
        // validation
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'website'=>'required',
            'logo'=>'required|max:512',
            'logo'=>'mimes:jpg,png,gif',
            
        ]);
        // if company has no logo
        if($request->logo == ''){
            Company::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request->website,
                'created_at'=> Carbon::now(),
            ]);
            
            return back()->withSuccess('Company Added!'); 
        } 
        else{
            // if company has logo
            $random_number= random_int(267782,4567784);
            $company_logo= $request->logo;
            $extension= $company_logo->getClientOriginalExtension();
            $file_name= Str::lower(str_replace(' ','-',$request->name)).'-'.$random_number.'.'.$extension;

            Image::make($company_logo)->save(public_path('uploads/company/'.$file_name));
            Company::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request->website,
                'logo'=>$file_name,
                'created_at'=> Carbon::now(),
            ]);
            return back()->withSuccess('Company Added!'); 
        }
        
    }
    // company details edit view
    function edit_company($company_id){
        $company= Company::find($company_id);
        return view('admin.company.edit_company',[
            'company'=>$company,
        ]);
    }
    // company details update
    function company_update(Request $request){
        // if logo don't want to update
        if($request->logo == ''){
            Company::find($request->company_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request->website,
            ]);
            toast('Details Updated!','success');
            return back();
        }
        // if logo want to update
        else{
            // if company don't have previous logo
            if(Company::find($request->company_id)->logo == ''){
                $random_number= random_int(267782,4567784);
                $company_logo= $request->logo;
                $extension= $company_logo->getClientOriginalExtension();
                $file_name= Str::lower(str_replace(' ','-',$request->name)).'-'.$random_number.'.'.$extension;

                Image::make($company_logo)->save(public_path('uploads/company/'.$file_name));
                Company::find($request->company_id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'website'=>$request->website,
                    'logo'=>$file_name,
                ]);
                toast('Details Updated!','success');
                return back();
            }
            // if company has previous logo
            else{
                // previous logo unlink code
                $present_image = Company::find($request->company_id);
                $delete_from = public_path('uploads/company/'.$present_image->logo);
                unlink($delete_from);

                $random_number= random_int(267782,4567784);
                $company_logo= $request->logo;
                $extension= $company_logo->getClientOriginalExtension();
                $file_name= Str::lower(str_replace(' ','-',$request->name)).'-'.$random_number.'.'.$extension;

                Image::make($company_logo)->save(public_path('uploads/company/'.$file_name));
                Company::find($request->company_id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'website'=>$request->website,
                    'logo'=>$file_name,
                ]);
                toast('Details Updated!','success');
                return back();
             }
        }
    }
    // company details delete
    function delete_company($company_id){
        // company don't have logo
        if(Company::find($company_id)->logo == ''){
            Company::find($company_id)->delete();
            toast('Company Details Deleted!','info');
            return back();
        }
        else{
        // company has logo
            $present_image = Company::find($company_id);
            $delete_from = public_path('uploads/company/'.$present_image->logo);
            unlink($delete_from);

            Company::find($company_id)->delete();
            toast('Company Details Deleted!','info');
            return back();
        }
        
    }
}

