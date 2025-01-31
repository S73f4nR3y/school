<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['semester', 'group', 'shift'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
