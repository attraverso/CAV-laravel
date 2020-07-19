<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('members', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('social_sec_nr')->nullable();
        $table->date('date_of_birth');
        $table->string('city_of_birth', 100);
        $table->string('province_of_birth', 15);
        $table->string('address', 150);
        $table->string('city', 86);
        $table->string('postal_code', 5);
        $table->string('province', 15);
        $table->string('phone_nr', 15)->nullable();
        $table->string('email', 255)->nullable();
        $table->string('notes', 255)->nullable();
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
        Schema::dropIfExists('members');
    }
}
