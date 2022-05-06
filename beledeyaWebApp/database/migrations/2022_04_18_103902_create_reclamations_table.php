<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('cin');
            $table->string('email')->nullable();
            $table->string('adresse')->nullable();
            $table->string('type');
            $table->string('sujet');
            $table->string('photo')->nullable();
            $table->string('status')->default('0'); //0 -> not seen | 1 -> seen | 2 -> resolved
            $table->string('num_rec');
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
        Schema::dropIfExists('reclamations');
    }
}
