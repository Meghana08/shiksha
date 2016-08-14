<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubject extends Model
{
    protected $fillable = ['user_id','user_type_id','class_subject_id','other_class','other_subject'];

    public function getSubject() {
        return $this->hasOne('App\ClassSubject', 'id', 'class_subject_id');            
    }
}
