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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')
            ->constrained('departments')
            ->cascadeOnDelete();
            $table->string('name');
            $table->date('birthday')->nullable();
            $table->text('discription')->nullable();
            $table->string('image')->nullable();
            $table->date('Graduation_date')->nullable();
            $table->enum('gender',['male','female']);
            $table->string('Specialization')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->char('languege',2)->default('en')->nullable() ;


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
        Schema::dropIfExists('doctors');
    }
};
