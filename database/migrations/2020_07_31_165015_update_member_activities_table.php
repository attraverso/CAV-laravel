<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMemberActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('member_activities', function (Blueprint $table) {
        $table->unsignedBigInteger('member_id')->after('class')->nullable();
        $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('member_activities', function (Blueprint $table) {
        $table->dropForeign('member_activities_member_id_foreign');
        $table->dropColumn('member_id');
      });
    }
}
