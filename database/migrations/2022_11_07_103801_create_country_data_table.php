<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_id')->nullable(false);
            $table->string('title')->nullable(false);
            $table->unsignedBigInteger('lang_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('master_id')->references('id')
                ->on('countries')
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
        Schema::dropIfExists('country_data');
    }
}
