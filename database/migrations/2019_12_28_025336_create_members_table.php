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
            $table->bigIncrements('id');

            // Name
            $table->string('lname');
            $table->string('fname');
            $table->date('dob');

            // Contact
            $table->string('email')->nullable();
            $table->tinyInteger('email_private')->default(1)->unsigned();
            $table->string('phone_mobile')->nullable();
            $table->tinyInteger('phone_mobile_private')->default(1)->unsigned(); 
            $table->string('phone_alt')->nullable();
            $table->tinyInteger('phone_alt_private')->default(1)->unsigned(); 
            
            // Confidential
            $table->date('application_date');
            $table->date('approval_date')->nullable();

            // Address
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');

            // Membership Info
            $table->unsignedBigInteger('mem_type_id');
            $table->unsignedBigInteger('mem_sponser_id')->nullable();

            // UID
            $table->unsignedBigInteger('user_id')->defult(0);

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
