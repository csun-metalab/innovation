<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartEndFundsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funds', function($table) {
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->dropColumn('received_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funds', function($table) {
            $table->dropColumn(['start_date','end_date']);
            $table->timestamp('received_at')->nullable();
        });
    }
}
