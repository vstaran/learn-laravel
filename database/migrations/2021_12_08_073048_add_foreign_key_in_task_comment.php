<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyInTaskComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_comment', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('task_id')
                ->references('task_id')
                ->on('task');

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
        Schema::table('task_comment', function (Blueprint $table) {
            $table->dropForeign('task_comment_user_id_foreign');
            $table->dropForeign('task_comment_task_id_foreign');
        });
    }
}
