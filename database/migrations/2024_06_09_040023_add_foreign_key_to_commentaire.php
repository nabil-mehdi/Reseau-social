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
        Schema::table('commentaires', function (Blueprint $table) {
            $table->unsignedBigInteger('profil_id')->after('id'); // Ajoute la colonne après 'id'
            $table->foreign('profil_id')->references('id')->on('profils')->cascadeOnDelete();
            $table->unsignedBigInteger('publication_id')->after('profil_id'); // Ajoute la colonne après 'id'
            $table->foreign('publication_id')->references('id')->on('publications')->cascadeOnDelete();
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
        Schema::table('commentaires', function (Blueprint $table) {
            //
        });
    }
};
