<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->text('description');
            $table->string('source');
            $table->date('commencement');
            $table->date('fin');
            $table->integer('id_vignette')->index();
            $table->foreign('id_vignette')->references('id')->on('vignettes')->onDelete('cascade');
            $table->integer('id_fichier')->index();
            $table->foreign('id_fichier')->references('id')->on('fichiers')->onDelete('cascade');

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
        Schema::dropIfExists('certifications');
    }
}
