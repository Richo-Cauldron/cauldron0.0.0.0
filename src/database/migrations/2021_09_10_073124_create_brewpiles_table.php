<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrewpilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brewpiles', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('card_id');
            // $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->string('name');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brewpiles');
        
    }
}
