<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationUsersToStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cr_users', function (Blueprint $table) {
            $table->integer('id_status')->unsigned();
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
        Schema::table('cr_users', function (Blueprint $table) {
            $table->dropForeign(['id_status']);
            $table->dropColumn('id_status');
        });

    }
}
