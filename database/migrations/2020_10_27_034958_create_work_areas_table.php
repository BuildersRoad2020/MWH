<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contractor_id')->index(); 
            $table->unsignedBigInteger('FormID');   
            $table->string('Type')->nullable();                                        
            $table->timestamps();        
            $table->foreign('contractor_id') 
                ->references('user_id') 
                ->on('contractors') 
                ->onDelete('cascade');                                               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_areas');
    }
}
