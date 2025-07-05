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
        Schema::create('tb_armadas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_id');
            $table->string('plat_number');
            $table->string('slug');
            $table->string('type');
            $table->string('vehicle');
            $table->string('fuel_type');
            $table->string('rent');
            $table->string('end_date');
            $table->string('contract');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('description');
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
        Schema::dropIfExists('tb_armadas');
    }
};
