<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorAccountsGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('major_accounts_group', function (Blueprint $table) {
            $table->integer('major_id');
            $table->string('description');
            $table->integer('mulflag');
            $table->timestamps();
            //set primary
            $table->primary('major_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('major_accounts_group');
    }
}
