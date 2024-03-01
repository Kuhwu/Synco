<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    use HasFactory;

    protected $table = 'projects';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = ProjectModel::select('projects.*')
            ->join('users', 'users.id', '=', 'projects.created_by')
            ->orderBy('projects.id', 'desc')
            ->where('projects.is_delete', 0)
            ->paginate(20);

        return $return;
    }

    public function getDocument()
    {
        if (!empty($this->document_file) && file_exists('upload/project/' . $this->document_file)) {
            return url('upload/project/' . $this->document_file);
        } else {
            return "";
        }
    }
}
