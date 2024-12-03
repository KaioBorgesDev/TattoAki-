<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('agendamento_tatuagems', function (Blueprint $table) {
            $table->id();
            $table->string('tatuagem');
            $table->date('data');
            $table->time('hora');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agendamento_tatuagems');
    }
};
