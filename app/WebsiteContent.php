<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteContent extends Model
{
    protected $fillable = ['title','content','file_type'];

    public function getFileType() {
        return $this->hasOne('App\FileType', 'id', 'file_type');
    }
}
