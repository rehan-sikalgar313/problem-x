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
    Schema::create('complaints', function (Blueprint $table) {

        $table->id();

        $table->string('complaint_id')->unique();

        $table->foreignId('user_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->string('category');

        $table->text('description');

        $table->string('evidence')->nullable();

        $table->text('location');

        $table->decimal('latitude', 10, 7)->nullable();

        $table->decimal('longitude', 10, 7)->nullable();

        $table->dateTime('reported_at')->nullable();

        $table->string('priority')->default('Pending');

        $table->string('status')->default('Submitted');

        $table->string('department')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};

