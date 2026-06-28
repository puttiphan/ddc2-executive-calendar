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
        Schema::create('executives', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('department_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('position_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('prefix', 50)->nullable();

            $table->string('first_name', 100);

            $table->string('last_name', 100);

            $table->string('display_name', 255);

            $table->string('email')->nullable();

            $table->string('phone', 30)->nullable();

            $table->string('avatar')->nullable();

            $table->string('calendar_color', 20)
                ->default('#2563eb');

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('executives');
    }
};