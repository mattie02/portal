<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_keys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('key_id');
            $table->timestamps();

            // Uniques only
            $table->unique(['member_id', 'key_id']);

            // Del on cascade
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('key_id')->references('id')->on('door_keys')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_keys');
    }
}
