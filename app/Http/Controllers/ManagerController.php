<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function managerlist(){
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Admin List";
        return view('Manager.manager.managerlist',$data);
    }
    public function add(){
        $data['header_title'] = "Add New Admin ";
        return view('Manager.manager.add',$data);
    }

    public function insert(Request $request){


        $user= new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type=1;
        $user->save();

        return redirect('manager/manager/list')->with('success', 'Admin successfully created');
    }
}
