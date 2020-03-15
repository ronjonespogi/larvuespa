<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCOATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id')->default(1);
            $table->integer('gl_major_code')->default(1);
            $table->integer('gl_level')->default(0);
            $table->integer('gl_parent_code')->default(0);
            $table->integer('gl_account_code')->default(0);
            $table->string('gl_description');
            $table->boolean('is_disabled')->default(0);
            $table->integer('priority_no')->default(9999);
            $table->timestamps();
            $table->primary(['company_id', 'gl_major_code', 'gl_level', 'gl_parent_code', 'gl_account_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chart_of_accounts');
    }
}
