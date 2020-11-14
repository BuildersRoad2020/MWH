<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocumentController extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('Documents', function (Blueprint $table) {
    $table->id(); 
    $table->unsignedBigInteger('contractor_id')->index(); 
    $table->unsignedBigInteger('FormID');
    $table->string('FileName')->nullable();
    $table->boolean('Status')->default('0');
    $table->string('Coverage')->nullable();
    $table->date('Expiration')->nullable();
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
         Schema::dropIfExists('Document');
    }
}
