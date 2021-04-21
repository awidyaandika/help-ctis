<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_centres', function (Blueprint $table) {
            $table->id();
            $table->string('centre_name', 32)->unique();
            $table->string('address')->unique();
            $table->string('postal_code', 8);
            $table->string('phone', 20)->unique();
            $table->string('city', 32);
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
        Schema::dropIfExists('test_centres');
    }
}
