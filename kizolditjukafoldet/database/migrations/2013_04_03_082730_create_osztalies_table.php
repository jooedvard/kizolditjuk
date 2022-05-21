<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Osztaly;

class CreateOsztaliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('osztaly', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
        });

        Osztaly::create(['nev' => 'DEK1A']);
        Osztaly::create(['nev' => 'DEK2A']);
        Osztaly::create(['nev' => 'DIV1']);
        Osztaly::create(['nev' => 'FOT1A']);
        Osztaly::create(['nev' => 'FOT1B']);
        Osztaly::create(['nev' => 'FOT2']);
        Osztaly::create(['nev' => 'GRA1A']);
        Osztaly::create(['nev' => 'GRA1B']);
        Osztaly::create(['nev' => 'GRA2A']);
        Osztaly::create(['nev' => 'GRA2B']);
        Osztaly::create(['nev' => 'IDV2']);
        Osztaly::create(['nev' => 'IRU1A']);
        Osztaly::create(['nev' => 'IRU1B']);
        Osztaly::create(['nev' => 'IRU2']);
        Osztaly::create(['nev' => 'KMM1']);
        Osztaly::create(['nev' => 'KMM2']);
        Osztaly::create(['nev' => 'MOA1']);
        Osztaly::create(['nev' => 'MOA2']);
        Osztaly::create(['nev' => 'PCS1']);
        Osztaly::create(['nev' => 'SZF1A']);
        Osztaly::create(['nev' => 'SZF1B']);
        Osztaly::create(['nev' => 'SZF2']);
        Osztaly::create(['nev' => 'VÜÜ1']);
        Osztaly::create(['nev' => 'eFOT1']);
        Osztaly::create(['nev' => 'eFOT2']);
        Osztaly::create(['nev' => 'eGRA1']);
        Osztaly::create(['nev' => 'eGRA2']);
        Osztaly::create(['nev' => 'eIRU1']);
        Osztaly::create(['nev' => 'eKIM1']);
        Osztaly::create(['nev' => 'eKIM2']);
        Osztaly::create(['nev' => 'eSZF1']);
        Osztaly::create(['nev' => 'eSZF2']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('osztaly');
    }
}
