<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            // $table->unsignedInteger('user_id');
            // $table->unsignedInteger('assignee')->nullable();
            // $table->unsignedInteger('project_id')->nullable();
            // $table->enum('type', ['question', 'action', 'exercises']);
            $table->unsignedInteger('user_id');  
            $table->string('name');
            $table->text('description');
            // $table->text('body');
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
        Schema::dropIfExists('tasks');
    }
}

// @TODO create, update, delete Task
// @TODO assign to user and/or project