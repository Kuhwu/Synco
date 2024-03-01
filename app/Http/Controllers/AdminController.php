<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function list(){
        $user = new User();
        $data['getRecord'] = $user->getAdmin();
        $data['header_title'] = "Admin List";
        return view('Admin.admin.list',$data);
    }
}
