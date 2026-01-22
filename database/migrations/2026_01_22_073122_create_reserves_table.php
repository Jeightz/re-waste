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
        Schema::create('reserves', function (Blueprint $table) {
            $table->string("reserve_id",50)->primary();
            $table->enum("status",["waiting for pickup,recieve,distributed"]);
            $table->date("reserve_at");
            $table->string("food_id",50);
            $table->string("redistributer_id",50);
            $table->foreign("food_id")->references("food_id")->on("food");
            $table->foreign("redistributer_id")->references("id")->on("userauths");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserves');
    }
};
