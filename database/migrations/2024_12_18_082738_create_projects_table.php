<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
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
            $table->text('image')->nullable(); // Main image for the project
            $table->text('images')->nullable(); //  images for the project

            $table->unsignedBigInteger('department_id'); // Foreign key to departments
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->enum('status', [ 'active', 'disabled']);

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
};
