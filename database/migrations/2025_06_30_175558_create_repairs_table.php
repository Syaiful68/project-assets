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
        Schema::create('tb_repairs', function (Blueprint $table) {
            $table->id();
            $table->string('repair_asset');
            $table->bigInteger('asset_id');
            $table->string('description');
            $table->enum('status', ['repair', 'good', 'destroy'])->default('repair');
            $table->bigInteger('user_id');
            $table->string('handler')->nullable();
            $table->bigInteger('user_handler')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_repairs');
    }
};
