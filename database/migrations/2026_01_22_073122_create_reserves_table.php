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
            $table->uuid("reserve_id")->primary();
            $table->enum("status",["waiting for pickup,recieve,distributed"]);
            $table->date("reserve_at");
            $table->uuid("food_id");
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
