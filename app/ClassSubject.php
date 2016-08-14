<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $fillable = ['class_id', 'subject_id', 'description','deleted'];

    public function getClassName() {
        return $this->hasOne('App\ClassName', 'id', 'class_id');
    }

    public function getSubject() {
        return $this->hasOne('App\Subject', 'id', 'subject_id');
    }
}
