<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')
                ->constrained('members')->cascadeOnDelete();
            $table->foreignId('book_id')
                ->constrained('books')->cascadeOnDelete();
            $table->string('status', 20)->default('dipinjam');
            $table->date('due_date')->nullable();
            $table->timestamps();
            $table->unique(['member_id', 'book_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};