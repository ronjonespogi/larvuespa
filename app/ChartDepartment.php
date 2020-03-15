<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartDepartment extends Model
{
    protected $table = 'chart_department_accounts';
    protected $guarded = [];
    protected $with = ['department_info'];

    public function department_info()
    {
        return $this->belongsTo('App\Department', 'department_id', 'department_id');
    }
}
