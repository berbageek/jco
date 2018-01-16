<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });

        Schema::table('tasklists', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('CASCADE');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('tasklist_id')->references('id')->on('tasklists')->onDelete('CASCADE');
            $table->foreign('assignee_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('SET NULL');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('commentator_id')->references('id')->on('users');
        });

        Schema::table('project_user', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
