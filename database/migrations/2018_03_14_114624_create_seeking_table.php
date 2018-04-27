<?php

declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekingTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('seeking', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_id');
            $table->string('title');
            $table->boolean('filled')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('seeking');
    }
}
