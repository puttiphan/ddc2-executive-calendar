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
        Schema::create('events', function (Blueprint $table) {

            $table->id();

            $table->foreignId('executive_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('category_id')
                ->constrained('event_categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('title',255);

            $table->longText('description')->nullable();

            $table->string('location')->nullable();

            $table->string('meeting_url')->nullable();

            $table->dateTime('start_datetime');

            $table->dateTime('end_datetime');

            $table->boolean('is_all_day')
                ->default(false);

            $table->string('priority',20)
                ->default('normal');

            $table->string('status',20)
                ->default('draft');

            $table->string('visibility',20)
                ->default('internal');

            $table->string('color',20)
                ->default('#2563eb');

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();

            $table->index([
                'executive_id',
                'start_datetime',
                'end_datetime'
            ]);

            $table->index([
                'status',
                'priority'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};