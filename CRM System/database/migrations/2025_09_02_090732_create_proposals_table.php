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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->String('title');
            $table->text('content');
            $table->decimal('estimate',10,2);
            $table->enum('status', ['draft', 'sent', 'accepted', 'rejected'])->default('draft');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
