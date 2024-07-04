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
        Schema::table('Publication', function (Blueprint $table) {
            $table->unsignedBigInteger('profil_id')->after('id'); // Ajoute la colonne après 'id'
            $table->foreign('profil_id')->references('id')->on('profils')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Publication', function (Blueprint $table) {
            //
        });
    }
};
