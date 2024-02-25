<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubjectApiTeacherModel extends Model
{
    use HasFactory;
    
    protected $table = 'assign_subject_teacher';

    protected $fillable = [
        'subject_id',
        'teacher_id',
        'status',
        'created_by',
    ];

    public function subject()
    {
        return $this->belongsTo(SubjectModel::class, 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    static public function getSingle($id){
        return self::find($id);
    }   

    static public function getRecord(){

        $return = self::select('assign_subject_teacher.*','subject.name as subject_name','teacher.name as teacher_name','user.name as created_by_name')
                    ->join('users as teacher', 'teacher.id', '=', 'assign_subject_teacher.teacher_id')
                    ->join('subject', 'subject.id', '=', 'assign_subject_teacher.subject_id')
                    ->join('user', 'user.id', '=', 'assign_subject_teacher.created_by')
                    ->where('assign_subject_teacher.is_delete','=',0);
        $return = $return->orderBy('assign_subject_teacher.id', 'desc')
                    ->paginate(50);

        return $return;
    }

    static public function getAlreadyFirst($subject_id,$teacher_id) {
        return self::where('subject_id', '=', $subject_id)->where('teacher_id', '=', $teacher_id)->first();
    }

    static public function getAssignTeacherID($subject_id){
        return self::where('teacher_id', '=', $subject_id)->where('is_delete', '=', 0)->get();
    }

    static public function deleteTeacher($subject_id){
        return self::where('teacher_id', '=', $subject_id);
    }
}
