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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new \App\Models\User([
            'nama' => 'admin',
            'password' => bcrypt('lescok123'),
        ]);
        $user->save();
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
