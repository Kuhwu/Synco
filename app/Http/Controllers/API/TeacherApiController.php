<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TeacherApiController extends Controller
{
    public function teacherList(){
        $teachers = User::where('user_type', 2)-> where('is_delete',0)->get();
        return response()->json([
            'teachers' => $teachers
        ],200);
    }
}
