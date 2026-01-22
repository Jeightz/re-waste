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
        Schema::create('distribution_logs', function (Blueprint $table) {
            $table->string("distribution_id")->primary();
            $table->string("food_id");
            $table->string("distributed_user_id");
            $table->date("distributed_at");
            $table->foreign("food_id")->references("food_id")->on("food");
            $table->foreign("distributed_user_id")->references("id")->on("userauths");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribution_logs');
    }
};
