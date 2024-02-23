<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class teacherListController extends Controller
{
    public function teacherList()
    {
        return view('Admin.admin.teacherlist.teacherlist');
    }
    
}
