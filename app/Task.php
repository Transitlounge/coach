<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name','description'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }    

}
