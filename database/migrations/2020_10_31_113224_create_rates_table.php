<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contractor_id')->index(); 
            $table->unsignedBigInteger('FormID');                                     
            $table->string('Class')->nullable();              
            $table->decimal('Rate',6,2)->nullable();         
            $table->decimal('Rate2',6,2)->nullable();                    
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
        Schema::dropIfExists('rates');
    }
}
