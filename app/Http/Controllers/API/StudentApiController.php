<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Validator;
use Hash;
use Auth;
use Str;


class StudentApiController extends Controller
{
    public function list(){
        $students = User::getStudent();
        return response()->json(['students' => $students],200);
    }

    public function insert(Request $request){

        $validator = Validator::make($request->all(), [
            'name' =>'required|string',
            'last_name' =>'required|string',
            'class_id' =>'required|string',
            'gender' =>'required|string',
            'status' =>'required|string',
            'date_of_birth' =>'nullable|date',
            'profile_pic' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2408',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ],400);
        }

        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->status = trim($request->status);
        if(!empty($request->date_of_birth)){
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(30);
            $filename = strtolower($randomStr). '.' . $ext;
            $file->move('uploads/profile/', $filename);

            $student->profile_pic = $filename;
        }

        $student->save();

        return response()->json(['message' => 'Student successfully added'],201);

    }
}
