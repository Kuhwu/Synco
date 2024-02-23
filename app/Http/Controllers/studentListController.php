<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;
use Str;
use Illuminate\Http\Request;


class studentListController extends Controller
{
    public function studentList()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('Admin.admin.studentlist.studentlist',$data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Student";
        return view('Admin.admin.studentlist.addStudent',$data);
    }

    public function insert(Request $request){
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

        return redirect('admin/student/list')->with('success','Student Successful Created');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);

        if (!empty($data['getRecord'])) {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = 'Edit Student';
            return view('Admin.admin.studentlist.editStudent', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $save = ClassModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->save();

        return redirect('admin/student/list')->with('success', 'Student list Successfully Updated');

    }

    public function delete($id)
    {
        $save = ClassModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();


        return redirect()->back()->with('success', 'Student list Successfully Deleted');

    }
}
    

