<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Auth;

class ClassController extends Controller
{
    public function classList()
    {
        $data['getRecord'] = ClassModel::getRecord();

        $data['header_title'] = "Class List";
        return view('Admin.admin.classlist.classlist', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Class';
        return view('Admin.admin.classlist.addClass', $data);
    }

    public function insert(Request $request)
    {
        $save = new ClassModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('admin/class/list')->with('success','Class successfully added');
    
    }

    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);

        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'Edit Class';
            return view('Admin.admin.classlist.editClass', $data);
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

        return redirect('admin/class/list')->with('success', 'Class Successfully Updated');

    }

    public function delete($id)
    {
        $save = ClassModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();


        return redirect()->back()->with('success', 'Class Successfully Deleted');

    }
}