<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsHasCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets_has_certifications', function (Blueprint $table) {
            $table->id();
            $table->integer('id_projet')->index();
            $table->foreign('id_projet')->references('id')->on('projets')->onDelete('cascade');
            $table->integer('id_certification')->index();
            $table->foreign('id_certification')->references('id')->on('certifications')->onDelete('cascade');
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
        Schema::dropIfExists('projets_has_certifications');
    }
}
