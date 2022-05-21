<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('osztaly_id')->default(1);
            $table->foreign('osztaly_id')->references('id')->on('osztaly')->onDelete('cascade')->onUpdate('cascade');
        });

        User::create(['name' => 'DEK1A_ofo', 'email' => 'dek1a@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 1]);
        User::create(['name' => 'DEK2A_ofo', 'email' => 'dek2a@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 2]);
        User::create(['name' => 'DIV1_ofo', 'email' => 'div1@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 3]);
        User::create(['name' => 'FOT1A_ofo', 'email' => 'fot1a@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 4]);
        User::create(['name' => 'FOT1B_ofo', 'email' => 'fot1b@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 5]);
        User::create(['name' => 'FOT2_ofo', 'email' => 'fot2@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 6]);
        User::create(['name' => 'GRA1A_ofo', 'email' => 'gra1a@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 7]);
        User::create(['name' => 'GRA1B_ofo', 'email' => 'gra1b@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 8]);
        User::create(['name' => 'GRA2A_ofo', 'email' => 'gra2a@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 9]);
        User::create(['name' => 'GRA2B_ofo', 'email' => 'gra2b@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 10]);
        User::create(['name' => 'IDV2_ofo', 'email' => 'idv2@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 11]);
        User::create(['name' => 'IRU1A_ofo', 'email' => 'iru1a@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 12]);
        User::create(['name' => 'IRU1B_ofo', 'email' => 'iru1b@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 13]);
        User::create(['name' => 'IRU2_ofo', 'email' => 'iru2@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 14]);
        User::create(['name' => 'KMM1_ofo', 'email' => 'kmm1@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 15]);
        User::create(['name' => 'KMM2_ofo', 'email' => 'kmm2@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 16]);
        User::create(['name' => 'MOA1_ofo', 'email' => 'moa1@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 17]);
        User::create(['name' => 'MOA2_ofo', 'email' => 'moa2@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 18]);
        User::create(['name' => 'PCS1_ofo', 'email' => 'pcs1@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 19]);
        User::create(['name' => 'SZF1A_ofo', 'email' => 'szf1a@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 20]);
        User::create(['name' => 'SZF1B_ofo', 'email' => 'szf1b@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 21]);
        User::create(['name' => 'SZF2_ofo', 'email' => 'szf2@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 22]);
        User::create(['name' => 'VÜÜ1_ofo', 'email' => 'vüü1@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 23]);
        User::create(['name' => 'eFOT1_ofo', 'email' => 'efot1@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 24]);
        User::create(['name' => 'eFOT2_ofo', 'email' => 'efot2@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 25]);
        User::create(['name' => 'eGRA1_ofo', 'email' => 'egra1@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 26]);
        User::create(['name' => 'eGRA2_ofo', 'email' => 'egra2@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 27]);
        User::create(['name' => 'eIRU1_ofo', 'email' => 'eiru1@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 28]);
        User::create(['name' => 'eKIM1_ofo', 'email' => 'ekim1@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 29]);
        User::create(['name' => 'eKIM2_ofo', 'email' => 'ekim2@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 30]);
        User::create(['name' => 'eSZF1_ofo', 'email' => 'eszf1@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 31]);
        User::create(['name' => 'eSZF2_ofo', 'email' => 'eszf2@zold.hu', 'password' =>'$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 'osztaly_id' => 32]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
