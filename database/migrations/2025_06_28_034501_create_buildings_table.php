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
        Schema::create('tb_buildings', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('owner_name');
            $table->string('address');
            $table->string('office_id');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('contact');
            $table->timestamp('contract');
            $table->integer('rent');
            $table->bigInteger('user_id');
            $table->softDeletes('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_buildings');
    }
};
