<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {

            $table->id('task_id');
            $table->string('name', 255)->index();
            $table->text('description')->default(null);
            $table->bigInteger('task_group_id')->unsigned();
            $table->bigInteger('creator_user_id')->unsigned();
            $table->bigInteger('assigned_user_id')->unsigned();
            $table->tinyInteger('priority')->default(1)->unsigned()->index();
            $table->bigInteger('task_status_id')->unsigned();
            $table->bigInteger('parent_task_id')->unsigned()->nullable();
            //$table->boolean('completed')->default(false);

            /* TODO task like (count_like) */
            //$table->bigInteger('like')->unsigned();

            $table->timestamps();

            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
