<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationMenuPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cr_pages', function (Blueprint $table) {
            $table->integer('id_status')->unsigned()->change();
            $table->integer('id_menu')->unsigned()->change();
            $table->foreign('id_menu')->references('id')->on('cr_menus');
            $table->foreign('id_status')->references('id')->on('cr_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cr_pages', function (Blueprint $table) {
            $table->dropForeign(['id_status']);
            $table->dropColumn('id_status');
            $table->dropForeign(['id_menu']);
            $table->dropColumn('id_menu');
        });
    }
}
