<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('struktur_kecs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jabatan', [
            'Camat',
            'Serketaris Camat',
            'Kasubag Perencanaan dan Keuangan',
            'Kasubag Umum dan Kepegawaian',
            'Seksi Perekonomian, Fisik, dan Sarana/Prasarana',
            'Seksi Kesejahteraan Sosial',
            'Seksi Trantib',
            'Seksi Pemerintahan'
        ]);
            $table->string('fotoProfil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('struktur_kecs');
    }
};
