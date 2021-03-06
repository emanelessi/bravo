<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('phone')->unique()->nullable();
            $table->string('password');
            $table->string('email')->unique()->nullable();
            $table->string('full_name');
            $table->timestamp('phone_verified_at')->nullable();
            $table->boolean('is_verify')->default(false);
            $table->string('forget_code')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('photo')->nullable();
            $table->softDeletes();
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
