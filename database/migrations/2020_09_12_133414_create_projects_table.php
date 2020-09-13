<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->default(1);
            $table->string('name');
            $table->dateTime('date_start')->nullable();
            $table->text('estimated_cost')->nullable();
            $table->boolean('project_state')->default(0);
            $table->text('final_price')->nullable();
            $table->string('assigned')->default('Discución');
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
        Schema::dropIfExists('projects');
    }
}
