<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('kids')) {
            Schema::create('kids', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('user_id');
                $table->string('name');
                $table->date('birthday');
                $table->string('sex');
                $table->string('father_name');
                $table->string('mother_name');
                $table->string('gridRadios');
                $table->string('memo');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kids');
    }
}
