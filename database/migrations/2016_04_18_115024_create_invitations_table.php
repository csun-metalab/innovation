<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('invitations', function(Blueprint $table)
        {
            // NOTE - if from_id & role_id are NULL & recipient_id contains user ID, recipient has invited himself ie: self-invitation
            $table->increments('id');
            $table->string('project_id'); // ID of the model instance to be approved --- PROJECT ID
            $table->string('from_id')->nullable(); // user ID of whom is sending the request for approval    ---- FROM
            $table->string('recipient_id'); // user ID of whom is recieving the request for approval    ---- TO
            $table->string('role_position')->nullable();
            $table->boolean('accepted')->default(false); // true (approved) or false (denied)      
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(); // If NOT NULL & Approved = 0 , then DENIED
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invitations');
    }
}

