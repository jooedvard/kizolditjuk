<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tevekenyseg;

class CreateTevekenysegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tevekenyseg', function (Blueprint $table) {
            $table->id();
            $table->string('tevekenyseg_nev');
            $table->unsignedTinyInteger('pontszam');
        });
        Tevekenyseg::create(['tevekenyseg_nev' => 'kerékpárral jöttem iskolába,  legalább 5 km ', 'pontszam' => '5']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'rollerrel jöttem iskolába,  legalább 3 km ', 'pontszam' => '3']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'gyalogoltam: legalább 2000 lépés ', 'pontszam' => '2']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'tömeg közlekedtem autózás helyett, (azoknak szól, akik egyébként autóval járnak iskolába) ', 'pontszam' => '5']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'ültettem fát ', 'pontszam' => '20']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'ültettem virágot ', 'pontszam' => '10']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'ültettem egyéb növényt ', 'pontszam' => '5']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'kevesebb vizet használtam a fürdéshez ', 'pontszam' => '1']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'kevesebb vizet használtam a zuhanyozáshoz ', 'pontszam' => '1']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'helyi terméket vásároltam a közértben', 'pontszam' => '1']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'összeszedtem a szemetet egy közterületen, erdőben, stb  (5 literes zacskónként)', 'pontszam' => '5']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'tartós szatyorba vásároltam, nem nylonba ', 'pontszam' => '10']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'nem használtam egyszer használatos műanyagot ', 'pontszam' => '10']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'tartós csomagolású terméket vásároltam, pl. üvegbe vettem a tejet, nem használtam pet palackot, ', 'pontszam' => '10']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'környezetbarát csomagolású terméket vásároltam ', 'pontszam' => '15']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'a héten maximum 1x ettem húsfélét ', 'pontszam' => '2']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'ökológiai gazdaságból származó élelmiszert vettem ', 'pontszam' => '15']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'kirándultam, szabadban töltöttem időt a héten  leaglább 4 óra  –', 'pontszam' => '5']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'kevesebb ruhát/terméket vásároltam a héten, hogy fenntarthatóbb legyen a környeztünk! ', 'pontszam' => '3']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'önkénteskedtem a Greenpeace- nél, vagy más zöld szervezetnél', 'pontszam' => '30']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'turiból vásároltam (másodkézből ruha,  bútor, használati cikk)  ', 'pontszam' => '10']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'felszedtem a csikket a suli előtt  legalább 10 csikk ', 'pontszam' => '5']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tevekenyseg');
    }
}
