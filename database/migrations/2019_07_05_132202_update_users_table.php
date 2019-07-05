<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function (Blueprint $table){
            $table->string('phone');
            $table->string('phone_2');
            $table->string('email_2');
            $table->text('picture');
            $table->text('profile_description');
            $table->integer('completed_works');
            $table->integer('completed_years');
            $table->integer('clients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function (Blueprint $table){
            $table->dropColumn('phone');
            $table->dropColumn('phone_2');
            $table->dropColumn('email_2');
            $table->dropColumn('picture');
            $table->dropColumn('profile_description');
            $table->dropColumn('completed_works');
            $table->dropColumn('completed_years');
            $table->dropColumn('clients');
        });
    }
}
