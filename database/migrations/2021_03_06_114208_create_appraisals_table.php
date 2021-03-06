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
            $table->integer('integrity')->nullable()->default(0);
            $table->integer('professionalism')->nullable()->default(0);
            $table->integer('teamwork')->nullable()->default(0);
            $table->integer('critical_thinking')->nullable()->default(0);
            $table->integer('conflict_management')->nullable()->default(0);
            $table->integer('attendance')->nullable()->default(0);
            $table->integer('ability_to_make_deadline')->nullable()->default(0);
            $table->integer('management')->nullable()->default(0);
            $table->integer('administration')->nullable()->default(0);
            $table->integer('presentation_skill')->nullable()->default(0);
            $table->integer('quality_of_work')->nullable()->default(0);
            $table->integer('efficiency')->nullable()->default(0);
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
