<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_tests', function (Blueprint $table) {
            $table->id();
            $table->string('officer_name', 64);
            $table->string('patient_name', 64);
            $table->date('test_date');
            $table->string('test_name', 40);
            $table->string('symptoms')->nullable();
            $table->date('result_date');
            $table->enum('status', ['Process', 'Completed'])->default('Process');
            $table->string('result', 100)->default('Your test is being processed by the Tester');
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
        Schema::dropIfExists('covid_tests');
    }
}
