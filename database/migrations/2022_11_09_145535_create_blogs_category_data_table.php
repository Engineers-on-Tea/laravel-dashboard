<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsCategoryDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs_category_data', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('description')->nullable();
            $table->unsignedBigInteger('master_id')->nullable(false);
            $table->unsignedBigInteger('lang_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('master_id')->references('id')->on('blogs_categories')->onDelete('cascade');
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs_category_data');
    }
}
