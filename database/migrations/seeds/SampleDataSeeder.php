<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
        DB::statement('INSERT INTO chart_department_accounts(department_id, company_id, gl_account_code) '
        . ' SELECT coatempsdept, coatempsbrcode, coatempsglcode '
        . ' FROM coatemps'
        );
        //DEPT
        DB::statement('TRUNCATE departments');
        DB::statement('ALTER TABLE departments AUTO_INCREMENT = 1');
        DB::statement('INSERT INTO departments(department_id, company_id, parent_id, department_description, dept_level, is_disabled) '
        . ' SELECT acctdeptid, acctdeptbrcode, acctdeptparent, acctdeptdescrip, acctdeptlevel, isdisabled '
        . ' FROM acctdept'
        );
    }
}
