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
        Schema::create('userinfos', function (Blueprint $table) {

            $table->string("userinfo_id",50)->primary();
            $table->string("name",255);
            $table->string("email",255)->unique();
            $table->enum("role",["donors","admin","redistributer"]);
            $table->foreign("userinfo_id")->references("id")->on("userauths")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userinfos');
    }
};
