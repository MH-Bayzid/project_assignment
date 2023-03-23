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
    function companies(){
        $companies= Company::paginate(5);
        return view('admin.company.list_company',[
            'companies'=>$companies,
        ]);
    }

    function company_store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'website'=>'required',
            'logo'=>'required|max:512',
            'logo'=>'mimes:jpg,png,gif',
            
        ]);
        if($request->logo == ''){
            Company::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request->website,
                'created_at'=> Carbon::now(),
            ]);
            toast('Company Added!','success');
            return back(); 
        } 
        else{
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
            toast('Company Added!','success');
            return back(); 
        }
        
    }
    function edit_company($company_id){
        $company= Company::find($company_id);
        return view('admin.company.edit_company',[
            'company'=>$company,
        ]);
    }

    function company_update(Request $request){
        if($request->logo == ''){
            Company::find($request->company_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request->website,
            ]);
            toast('Details Updated!','success');
            return back();
        }
        else{
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
            else{
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

    function delete_company($company_id){
        $present_image = Company::find($company_id);
        $delete_from = public_path('uploads/company/'.$present_image->logo);
        unlink($delete_from);

        Company::find($company_id)->delete();
        toast('Company Details Deleted!','info');
        return back();
    }
}
