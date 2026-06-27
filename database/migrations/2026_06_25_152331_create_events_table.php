<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->text('description')->nullable();

            $table->foreignId('boss_id')->nullable()->constrained()->nullOnDelete();

            $table->dateTime('start');

            $table->dateTime('end');

            $table->string('location')->nullable();

            $table->string('color')->default('#2563eb');

            $table->boolean('all_day')->default(false);

            $table->enum('status', [
                'draft',
                'confirmed',
                'cancelled'
            ])->default('confirmed');

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};