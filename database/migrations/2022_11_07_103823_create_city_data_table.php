<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_id')->nullable(false);
            $table->string('title')->nullable(false);
            $table->unsignedBigInteger('lang_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('master_id')->references('id')
                ->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('lang_id')->references('id')
                ->on('languages')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_data');
    }
}
