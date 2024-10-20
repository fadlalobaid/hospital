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
        Schema::create('doctor_nurse', function (Blueprint $table) {

            $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete(); //
            $table->foreignId('nurse_id')->constrained('nurses')->cascadeOnDelete(); // and
            $table->primary([
                'doctor_id',
                'nurse_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_nurse');
    }
};
