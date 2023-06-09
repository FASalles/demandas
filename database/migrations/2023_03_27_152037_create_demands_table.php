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

            $table->string('title')->nullable();
            $table->text('body')->nullable();

            $table->string('attached_issue')->nullable();
            $table->string('budgeted_hours')->nullable();
            $table->foreignId('sectors_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('users_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('system_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('demands_type_id')->nullable()->constrained()->cascadeOnDelete();

            $table->dateTime('started_at')->nullable();
            $table->dateTime('ended_at')->nullable();

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
