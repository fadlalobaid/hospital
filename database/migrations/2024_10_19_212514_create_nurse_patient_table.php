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
        Schema::create('nurse_patient', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nurse_id')->constrained('nurses')->cascadeOnDelete(); //
            $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete(); // only
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
        Schema::dropIfExists('nurse_patient');
    }
};
