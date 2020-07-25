<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'source',
        'citizen_id',
        'category_id',
        'long',
        'lat',
        'location',
        'description',
        'complaint_status_id',
        'voteup_count'
    ];
    public function citizen(){
        return $this->belongsTo('App\Citizen');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

}
