<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyInTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('task_group_id')
                ->references('task_group_id')
                ->on('task_groups')
                ->onDelete('cascade');

            $table->foreign('creator_user_id')
                ->references('id')
                ->on('users');

            $table->foreign('assigned_user_id')
                ->references('id')
                ->on('users');

            $table->foreign('task_status_id')
                ->references('task_status_id')
                ->on('task_statuses');

            $table->foreign('parent_task_id')
                ->references('task_id')
                ->on('tasks')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /**
         * @see <table_name>_<column_name>_foreign
         */
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_task_group_id_foreign');
            $table->dropForeign('tasks_creator_user_id_foreign');
            $table->dropForeign('tasks_assigned_user_id_foreign');
            $table->dropForeign('tasks_parent_task_id_foreign');
        });
    }
}
