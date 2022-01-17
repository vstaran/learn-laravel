<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_task', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_id')->unsigned()->index();

            $table->string('key', 255)->index();
            $table->text('value')->default(null);

            $table->timestamps();

            $table->foreign('task_id')
                ->references('task_id')
                ->on('tasks');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_task');
    }
}
