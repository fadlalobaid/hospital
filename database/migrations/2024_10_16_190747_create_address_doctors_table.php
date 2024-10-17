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
        Schema::create('address_doctors', function (Blueprint $table) {
            // $table->id();
            $table->primary('doctor_id');
            $table->foreignId('doctor_id')
            ->constrained('doctors')
            ->cascadeOnDelete();
            $table->char('country',2)->nullable();
            $table->string('city')->nullable();
            $table->String('home')->nullable();
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
        Schema::dropIfExists('address_doctors');
    }
};
