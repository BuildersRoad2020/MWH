<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();   //Reference to Admin who created the account
            $table->string('contractor_name');
            $table->integer('role')->default('2');
            $table->boolean('status')->default('0');          // allow vendor or not | hold vendor account
            $table->longtext('address')->nullable();
            $table->string('city')->nullable()->default('1');
            $table->string('postcode')->nullable();
            $table->string('state')->nullable()->default('1');
            $table->string('country')->nullable()->default('1');
            $table->string('abn')->nullable();
            $table->string('Name_primarycontact')->nullable();
            $table->string('phone_primary')->nullable();
            $table->string('email_primary')->nullable();
            $table->string('Name_secondarycontact')->nullable();
            $table->string('phone_secondary')->nullable();
            $table->string('email_secondary')->nullable();
            $table->string('terms')->nullable();
            $table->string('currency')->nullable();
            $table->string('bankname')->nullable();
            $table->string('branch')->nullable();
            $table->string('accountname')->nullable();
            $table->string('bsb')->nullable();
            $table->string('accountnumber')->nullable();
            $table->timestamps();


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('contractors');
    }
}
