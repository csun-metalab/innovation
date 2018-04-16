<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurposeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        //refactor project purpose
        Schema::create('purpose', function (Blueprint $table) {
            $table->string('system_name');
            $table->string('display_name');
            $table->timestamp('created_at')
                  ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                  ->nullable();
            $table->primary('system_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('purpose');
    }
}
