<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turbine_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turbine_id')->references('id')->on('turbines')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('component_id')->references('id')->on('components')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('rating', [1, 2, 3, 4, 5])->comment('1 being perfect and 5 being completely broken/missing');
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
        Schema::dropIfExists('turbine_components');
    }
};
