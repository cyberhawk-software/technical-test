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
            $table->bigInteger('turbine_id')->unsigned();
            $table->bigInteger('component_id')->unsigned();
            $table->enum('grade',[1, 2, 3, 4, 5])->default(1);
            $table->text('specification');
            $table->enum('status',['active','deactive'])->default('active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('turbine_id')->references('id')->on('turbines')->onDelete('cascade');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');

            
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
