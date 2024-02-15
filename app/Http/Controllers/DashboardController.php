<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['header_title'] = "Dashboard";
        if(Auth::user()->user_type == 1){
            return view('Admin.admindash', $data);
        }
        elseif(Auth::user()->user_type == 2){
            return view('Teacher.teacherdash', $data);
        }
        elseif(Auth::user()->user_type == 3){
            return view('Student.studentdash', $data);
        }
    }
}
