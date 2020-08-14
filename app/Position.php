<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['name', 'created_user_id', 'updated_user_id'];

    public function employees () {
        return $this->hasMany(Employee::class);
    }
}
