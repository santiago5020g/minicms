<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cr_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->binary('content');
            $table->integer('number');
            $table->integer('id_status')->unsigned();
            $table->integer('id_page')->unsigned();
            $table->foreign('id_status')->references('id')->on('cr_statuses');
            $table->foreign('id_page')->references('id')->on('cr_pages');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cr_sections');
    }
}
