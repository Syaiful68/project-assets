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
        Schema::create('tb_assets', function (Blueprint $table) {
            $table->id();
            $table->string('sn')->nullable();
            $table->string('asset_code');
            $table->string('asset_name');
            $table->enum('type', ['electronic', 'machine', 'furnitur']);
            $table->string('pic');
            $table->enum('condition', ['repair', 'good', 'destroy'])->default('good');
            $table->unsignedBigInteger('location');
            $table->string('description');
            $table->softDeletes('deleted_at')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_assets');
    }
};
