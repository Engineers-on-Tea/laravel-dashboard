<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_data', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('body')->nullable(false);
            $table->unsignedBigInteger('master_id')->nullable(false);
            $table->unsignedBigInteger('lang_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('master_id')->references('id')->on('blogs')->onDelete('cascade');
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
        Schema::dropIfExists('blog_data');
    }
}
