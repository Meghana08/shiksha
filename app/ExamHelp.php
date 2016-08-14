<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamHelp extends Model
{
    protected $fillable = ['user_id'];

    public function getVisitor() {
        return $this->hasOne('App\UserDetails', 'id', 'user_id');
    }

    public function getHelpSubjects() {
        return $this->hasMany('App\ExamHelpSubject', 'help_id', 'id');
    }
}
