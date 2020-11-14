 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_sets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contractor_id')->index();
            $table->boolean('MP')->default('0'); //Media Player and Screen Installation
            $table->boolean('VW')->default('0'); // Videowall Installation
            $table->boolean('KIO')->default('0'); // Kiosk Installation
            $table->boolean('LED')->default('0'); // LED installation
            $table->boolean('AUD')->default('0'); // Audio Equipment Installation
            $table->boolean('CAB')->default('0'); // Cabling (Non-Electrical)
            $table->boolean('NDIA')->default('0'); // Networking Device Installation and Administration
            $table->boolean('BPC')->default('0'); // Basic PC Skills
            $table->boolean('APC')->default('0'); // Advanced PC Skills
            $table->boolean('DAR')->default('0'); // Decommissioning and Relocation
            $table->boolean('EW')->default('0'); // Electrical Works
            $table->boolean('PROJ')->default('0'); // Projector/Lamp installation and Troubleshooting

            $table->boolean('STOR')->default('0');   // Storage   
            $table->boolean('DEL')->default('0');  // Delivery
            $table->boolean('RDIS')->default('0');   // Rubbish Disposal
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
        Schema::dropIfExists('skill_sets');
    }
}
