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
        Schema::create('food', function (Blueprint $table) {
            $table->uuid("food_id")->primary();
            $table->string("name",255);
            $table->unsignedInteger("quantity");
            $table->enum("category",["fruits,vegetebles,grains,protein foods,dairy"]);
            $table->date("expiry_date");
            $table->enum("status",["available,reserve,distributed,expired"]);
            $table->uuid("donor_id");
            $table->foreign("donor_id")->references("id")->on("userauths")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
