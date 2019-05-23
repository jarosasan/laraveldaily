<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $fillable = [
       'name', 'email', 'logo', 'website'
       ];


    public function employees()
    {
        return $this->hasMany('App\Employee', 'company_id');
    }

    public function getEmployeesCount()
    {
        return $this->employees()->count();
    }
}

