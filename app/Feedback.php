<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['user_id','response','material', 'query_resolve', 'message'];

    public function getUser() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getResponseGrade() {
        return $this->hasOne('App\FeedbackGrade', 'id', 'response');
    }

    public function getMaterialGrade() {
        return $this->hasOne('App\FeedbackGrade', 'id', 'material');
    }

    public function getQueryResolveGrade() {
        return $this->hasOne('App\FeedbackGrade', 'id', 'query_resolve');
    }
}
