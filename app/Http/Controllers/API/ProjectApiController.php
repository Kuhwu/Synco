<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProjectModel;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use Auth;
use Str;

class ProjectApiController extends Controller
{
    public function project(){
        $data['header_title'] = 'Project';
        return view('admin.homework.list1', $data);
    }
    public function add(){
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add New Project';
        return view('admin.homework.add', $data);
    }
    
    public function insert(Request $request){
        $project = new ProjectModel;
        $project->class_id = trim($request->class_id);
        $project->subject_id = trim($request->subject_id);
        $project->project_date = trim($request->project_date);
        $project->submission_date = trim($request->submission_date);
        $project->description = trim($request->description);
        $project->created_by = Auth::user()->id;

        if(!empty($request->file('document_file'))){
            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis').Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('uploads/project/', $filename);

            $project->document_file = $filename;
        }

        $project->save();

        return redirect('admin/project/list')->with('success','Project successfully added');
    }

    public function ajax_get_subject(Request $request){
        $class_id = $request->class_id;
        $getSubject = ClassSubjectModel::MySubject($class_id);
        $html = '';
        $html .= '<option value = "">Select Subject</option>';
        foreach($getSubject as $key => $value){
            $html .= '<option value = "'.$value->subject_id.'">'.$value->subject_name.'</option>';
        }

        $json['success'] = $html;
        echo json_encode($json);
    }

}
