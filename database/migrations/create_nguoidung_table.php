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
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('email')->unique();
            $table->string('sodienthoai')->unique();
            //$table->string('facebook')->nullable();
            $table->string('anhdaidien')->nullable();
            $table->bigInteger('sodukhadung')->default(0);
           // $table->timestamp('email_verified_at')->nullable();
            $table->string('matkhau');
            $table->timestamps();
            //$table->rememberToken();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidung');
    }
}
