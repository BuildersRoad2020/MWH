<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Forms', function (Blueprint $table) {
            $table->id();   
            $table->string('Doc_Desc');                    
            $table->string('FileName')->nullable();              
            $table->unsignedBigInteger('Country')->index();    
            $table->unsignedBigInteger('State')->index()->nullable();                         
            $table->string('Type');            
            $table->timestamps();

             $table->foreign('Country') 
                ->references('id') 
                ->on('countries')
                ->onDelete('cascade');     

             $table->foreign('State') 
                ->references('id') 
                ->on('states')
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
        Schema::dropIfExists('Forms');
    }
}
