<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReseauPublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reseau_publics', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('UserId');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('cin');
            $table->string('email')->nullable();
            $table->string('adresse');
            $table->string('type');
            $table->string('description');
            $table->string('status')->default('0'); //0 -> not seen | 1 -> in progress | 2 -> Accepted| 3 -> rejected
            $table->string('num_branch');
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
        Schema::dropIfExists('reseau_publics');
    }
}
