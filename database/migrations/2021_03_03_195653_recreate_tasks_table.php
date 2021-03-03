<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tasks');
        
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->timestamps();
            $table->string('status', 10); 
             $table->unsignedBigInteger('user_id');

       // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
            
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
