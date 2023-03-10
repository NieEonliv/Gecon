<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->enum('role', ['student', 'admin', 'teacher']);
            $table->string('email')->unique();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('patronymic')->nullable();
            $table->date('birthday')->nullable();
            $table->text('photo')->nullable();
            $table->unsignedInteger('level')->default(1);
            $table->enum('class', ['Воин', 'Маг', 'Элементалист', 'Следопыт'])->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
