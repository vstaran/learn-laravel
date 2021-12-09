<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskToLabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_to_label', function (Blueprint $table) {
            $table->bigInteger('task_id')->unsigned();
            $table->bigInteger('task_label_id')->unsigned();
        });

//        Schema::table('task_to_label', function (Blueprint $table) {
//            $table->foreign('task_id')
//                ->references('task_id')
//                ->on('task');
//
//            $table->foreign('task_label_id')
//                ->references('task_label_id')
//                ->on('task_label');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

//        Schema::table('task_to_label', function (Blueprint $table) {
//            $table->dropForeign('task_to_label_task_id_foreign');
//            $table->dropForeign('task_to_label_task_label_id_foreign');
//        });

        Schema::dropIfExists('task_to_label');
    }
}
