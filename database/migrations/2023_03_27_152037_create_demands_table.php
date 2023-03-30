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
        Schema::create('demands', function (Blueprint $table) {
            $table->id();

            $table->text('title');
            $table->text('body');

            $table->string('attached_issue')->nullable();
            $table->string('budgeted_hours');
            $table->foreignId('sector_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->foreignId('sector_id')->constrained()->cascadeOnDelete();
            $table->foreignId('system_id')->constrained()->cascadeOnDelete();
            $table->foreignId('demands_type_id')->constrained()->cascadeOnDelete();

            $table->string('attached_issue')->nullable();


            $table->timestamp('started_at');
            $table->timestamp('ended_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demands');
    }
};
