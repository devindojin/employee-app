<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('sur_name')->nullable();
            $table->string('name');
            $table->string('last name')->nullable();
            $table->string('file_name')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('city')->nullable();
            $table->string('pays')->nullable();
            $table->string('telephone')->nullable();
            $table->string('contract_desired')->nullable();
            $table->string('position_wishes_1')->nullable();
            $table->string('position_wishes_2')->nullable();
            $table->string('annual_salary')->nullable();
            $table->string('availability')->nullable();
            $table->string('mobility')->nullable();
            $table->string('email_notification')->nullable();
            $table->string('experience')->nullable();
            $table->timestamp('lph_From')->nullable();
            $table->timestamp('lph_To')->nullable();
            $table->string('still_in_office')->nullable();
            $table->string('job_title')->nullable();
            $table->string('function')->nullable();
            $table->string('gross_annual_salary')->nullable();
            $table->string('assignments')->nullable();
            $table->string('level_of_education')->nullable();
            $table->string('training_type')->nullable();
            $table->string('lang_1')->nullable();
            $table->string('lang_2')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
