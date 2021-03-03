<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('integrity')->default(0);
            $table->integer('professionalism')->default(0);
            $table->integer('teamwork')->default(0);
            $table->integer('critical_thinking')->default(0);
            $table->integer('conflict_management')->default(0);
            $table->integer('attendance')->default(0);
            $table->integer('ability_to_make_deadline')->default(0);
            $table->integer('management')->default(0);
            $table->integer('administration')->default(0);
            $table->integer('presentation_skill')->default(0);
            $table->integer('quality_of_work')->default(0);
            $table->integer('efficiency')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appraisals');
    }
}
