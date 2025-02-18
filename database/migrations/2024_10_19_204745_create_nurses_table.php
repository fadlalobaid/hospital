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
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')
            ->nullable()
            ->constrained('departments')
            ->cascadeOnDelete();
            // $table->foreignId('user_id')
            // ->constrained('users')
            // ->cascadeOnDelete();
        $table->string('name');
        $table->date('birthday')->nullable();
        $table->string('image')->nullable();
        $table->enum('gander', ['male', 'female']);
        $table->string('email');
        $table->bigInteger('phone')->nullable();
        $table->char('country',2)->nullable();
        $table->string('city')->nullable();
        $table->string('street')->nullable();


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
        Schema::dropIfExists('nurses');
    }
};
