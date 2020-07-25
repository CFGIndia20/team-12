<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id'; 

    public $incrementing = false;
    protected $fillable = [
        'title',
        'parent-id'
    ];
    public function complaints(){
        return $this->hasMany('App\Complaint');
    }
}
