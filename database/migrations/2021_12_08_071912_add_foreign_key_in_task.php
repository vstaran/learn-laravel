<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyInTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->foreign('task_group_id')
                ->references('task_group_id')
                ->on('task_group')
                ->onDelete('cascade');

            $table->foreign('creator_user_id')
                ->references('id')
                ->on('users');

            $table->foreign('assigned_user_id')
                ->references('id')
                ->on('users');

            $table->foreign('task_label_id')
                ->references('task_label_id')
                ->on('task_label');

            $table->foreign('task_status_id')
                ->references('task_status_id')
                ->on('task_status');

            $table->foreign('parent_task_id')
                ->references('task_id')
                ->on('task')
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
        Schema::table('task', function (Blueprint $table) {
            $table->dropForeign('task_task_group_id_foreign');
            $table->dropForeign('task_creator_user_id_foreign');
            $table->dropForeign('task_assigned_user_id_foreign');
            $table->dropForeign('task_task_label_id_foreign');
            $table->dropForeign('task_parent_task_id_foreign');
        });
    }
}
