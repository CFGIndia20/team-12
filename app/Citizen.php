<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    protected $fillable = [
        'source',
        'phone_no'
    ];
    public function complaints(){
        return $this->hasMany('App\Complaint');
    }
}
