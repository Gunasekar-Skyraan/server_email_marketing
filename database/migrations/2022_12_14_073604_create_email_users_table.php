<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_email');
            $table->string('phone_number');
            $table->string('same_as_ph');
            $table->string('whatsapp_number');
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('gender');
            $table->string('country');
            $table->string('city');
            $table->string('pincode');
            $table->string('block');
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('admin_id');
            $table->boolean('is_active')->default(0);
            $table->string('deleted_at')->default(0);
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
        Schema::dropIfExists('email_users');
    }
};
