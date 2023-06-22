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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('task_name')->nullable()->default('');
            $table->enum('category', ['Kuliah', 'Kerja']);
            $table->enum('difficulty_level', ['Easy', 'Medium', 'Hard']);
            $table->string('due_date')->default('2023-06-23');
            $table->enum('status', ['Urgent', 'Tidak_urgent']);
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
        Schema::dropIfExists('task');
    }
}
