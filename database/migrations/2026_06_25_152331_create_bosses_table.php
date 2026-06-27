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
        Schema::create('bosses', function (Blueprint $table) {
            $table->id();

            $table->string('prefix', 20)->nullable();
            $table->string('first_name');
            $table->string('last_name');

            $table->string('position');
            $table->string('department')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('color', 20)->default('#3B82F6');

            $table->string('photo')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bosses');
    }
};