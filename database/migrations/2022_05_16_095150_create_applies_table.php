<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->dateTime('apply_date');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('age');
            $table->string('post_code');
            $table->string('prefecture');
            $table->string('city');
            $table->string('address');
            $table->string('building')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->foreignId('user_id');
            $table->string('flag')->nullable();
            $table->mediumText('qanda');
            $table->text('receipt_image_required');
            $table->text('receipt_image_optional')->nullable();
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
        Schema::dropIfExists('applies');
    }
}
