<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\SubjectModel;
use Hash;
use Auth;
use Str;
use Illuminate\Http\Request;


class teacherListController extends Controller
{
    public function teacherList()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Teacher List";
        return view('Admin.admin.teacherlist.teacherlist',$data);
    }

    public function add()
    {
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = "Add New Teacher";
        return view('Admin.admin.teachertlist.addTeacher',$data);
    }

    public function insert(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);

        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->class_id = trim($request->class_id);
        if(!empty($request->date_of_birth)){
            $student->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('uploads/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/teacher/list')->with('success','Student Successful Created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);

        if (!empty($data['getRecord'])) {
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = 'Edit Student';
            return view('Admin.admin.teacherlist.editTeacher', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {

        request()->validate([
            'email' => 'required|email|unique:users'.$id
        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->subject_id = trim($request->subject_id);
        if(!empty($request->date_of_birth)){
            $student->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('uploads/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if(!empty($request->password))
        {
            $student->password = Hash::make($request->password);
        }
        $student->save();

        return redirect('admin/teacher/list')->with('success','Teacher Successful Updated');
        

    }

    public function delete($id)
    {
        
        $getRecord = User::getSingle($id);

        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success','Student Successful Deleted');
        } else {
            abort(404);
        }
    }

    /*public function MyStudent($id){
        $data['getRecord'] = (array) User::getTeacherStudent(Auth::user()->id);
        $data['header_title'] = 'My Student List';
        return view('Admin.admin.teacher.my_student',$data);
    }*/

    public function MyStudent($id){
        $data['getRecord'] = User::getTeacherStudent(Auth::user());
        $data['header_title'] = 'My Student List';
        return view('Admin.admin.teacher.my_student',$data);
    }
}
    

