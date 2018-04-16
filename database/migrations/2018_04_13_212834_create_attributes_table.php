<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->string('project_id');
            //From the original 'featured_projects' table.
            $table->boolean('is_featured')
                  ->default(false);
            //From the original 'project_seeking'  table.
            $table->boolean('seeking_collaborators')
                  ->default(false);
            $table->boolean('seeking_students')
                  ->default(false);
            $table->string('purpose_name')
                  ->nullable();

            $table->timestamp('created_at')
                  ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                  ->nullable();

            $table->primary('project_id');
            // $table->foreign('project_id')
            //       ->references('project_id')
            //       ->on('projects')
            //       ->onDelete('cascade');
            // $table->foreign('purpose_name')
            //       ->references('system_name')
            //       ->on('purpose')
            //       ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
    }
}
