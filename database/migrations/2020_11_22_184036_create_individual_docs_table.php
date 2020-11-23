<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technician_id')->index();             
            $table->unsignedBigInteger('contractor_id')->index();             
            $table->timestamps();
            $table->unsignedBigInteger('FormID');
            $table->string('FileName')->nullable();
            $table->boolean('Status')->default('0');
            $table->string('Coverage')->nullable();
            $table->date('Expiration')->nullable();            

            $table->foreign('technician_id')
                ->references('id')
                ->on('technicians')
                ->onDelete('cascade');            

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
        Schema::dropIfExists('individual_docs');
    }
}
