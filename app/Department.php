<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $guarded = [];
    protected $with = [
        'chart_departments'
    ];

    public function chart_departments() {
        return $this->hasMany('App\ChartDepartment', 'department_id', 'department_id');
    }
}
