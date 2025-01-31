<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'age', 'email', 'phone', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
