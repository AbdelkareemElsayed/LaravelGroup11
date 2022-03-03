<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('blogs',function (Blueprint $table ){

               $table->id();
               $table->string('title',20);
               $table->string('content');
               $table->timestamps();

               $table->foreignId('user_id')
               ->constrained('users')
               ->onUpdate('cascade')
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
        //
           Schema::dropIfExists("blogs");
    }
}
