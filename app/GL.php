<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GL extends Model
{
    protected $table = 'chart_of_accounts';
    protected $guarded = [];
    protected $with = [
        //'major_accounts_group',
        'department_accounts'
    ];
    //not needed
    // public function major_accounts_group()
    // {
    //     return $this->belongsTo('App\MajorAccountsGroup', 'gl_major_code', 'major_id');
    // }
    public function department_accounts()
    {
        return $this->belongsTo('App\ChartDepartment', 'gl_account_code', 'gl_account_code');
    }

}
