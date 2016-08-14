<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFile extends Model
{
    protected $fillable = ['class_subject_id','data_type_id','file_name','description'];

    public function getClassSubject() {
        return $this->hasOne('App\ClassSubject', 'id', 'class_subject_id');
    }

    public function getFileType() {
        return $this->hasOne('App\DataFileType', 'id', 'data_type_id');
    }
}
