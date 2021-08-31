<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_profile', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('avatar_src')->nullable();
            $table->string('bio')->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('coordinate')->nullable();
            $table->string('artist_type')->nullable();
            $table->string('send_mail')->default('off');
            $table->string('hide_age')->default('off');
            $table->string('collab_status')->default('on');
            $table->string('slack_url')->nullable();
            $table->string('social_fb')->nullable();
            $table->string('social_tw')->nullable();
            $table->string('social_insta')->nullable();
            $table->string('social_lin')->nullable();
            $table->string('profile_complete')->default('off');

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
        Schema::dropIfExists('tbl_profile');
    }
}
