<?php

declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ConsolidateExtraTablesIntoAttributesTable extends Migration
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
        //create the new table
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
            $table->foreign('project_id')
                  ->references('project_id')
                  ->on('exploration.projects')
                  ->onDelete('cascade');
            $table->foreign('purpose_name')
                  ->references('system_name')
                  ->on('purpose')
                  ->onDelete('set null');
        });
        //drop the old ones.
        Schema::dropIfExists('project_purpose');
        Schema::dropIfExists('featured_projects');
        Schema::dropIfExists('project_seeking');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        //restore the old tables
        Schema::create('project_purpose', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_id');
            $table->string('purpose');
            $table->timestamp('created_at')
                  ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                  ->nullable();
            //$table->primary('id');
        });
        Schema::create('featured_projects', function (Blueprint $table) {
            $table->string('project_id');
            $table->boolean('is_featured');
            $table->timestamp('created_at')
                  ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                  ->nullable();
            $table->primary('project_id');
        });
        Schema::create('project_seeking', function (Blueprint $table) {
            $table->string('project_id');
            $table->boolean('collaborators');
            $table->boolean('students');
            $table->timestamp('received_at')
                  ->nullable();
            $table->timestamp('created_at')
                  ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                  ->nullable();
            $table->primary('project_id');
        });
        //drop the new one
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('purpose');
    }
}
