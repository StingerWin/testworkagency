<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'photo', 'position_id', 'date', 'phone_number', 'email', 'head_id', 'salary', 'created_user_id', 'updated_user_id'];

    public function position () {
        return $this->belongsTo(Position::class);
    }

    public function head () {
        return $this->belongsTo(Employee::class);
    }

    public function subordinates () {
        return $this->hasMany(Employee::class, 'head_id', 'id');
    }
}
