<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PopulateCOATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //populating sample data from existing data sample
        //COA
        DB::statement('TRUNCATE chart_of_accounts');
        DB::statement('ALTER TABLE chart_of_accounts AUTO_INCREMENT = 1');
        DB::statement('INSERT INTO chart_of_accounts(company_id, gl_major_code, gl_level, gl_parent_code, '
        . ' gl_account_code, gl_description, is_disabled, priority_no) '
        . ' SELECT glbrcode,glmajorcode,gllevel,glparentcode,glaccountcode,gldescrip, isdisabled,priorityno '
        . ' FROM glacc'
        );
        //COA DEPT
        DB::statement('TRUNCATE chart_department_accounts');
        DB::statement('ALTER TABLE chart_department_accounts AUTO_INCREMENT = 1');
        DB::statement('INSERT INTO chart_department_accounts(id, department_id, company_id, gl_account_code) '
        . ' SELECT coatempsdept, coatempsbrcode, coatempsglcode '
        . ' FROM coatemps'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
