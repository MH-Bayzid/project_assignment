<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    function user_list(){
        $users= User::all();
        return view('admin.users.users',[
            'users'=>$users,
        ]);
    }
    function user_delete($user_id){
        User::find($user_id)->delete();
        toast('Admin Deleted!','info');
        return back();
    }
}
