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
        Schema::create('tb_compenies', function (Blueprint $table) {
            $table->id();
            $table->string('compeny_name');
            $table->string('owner_name');
            $table->string('contact');
            $table->string('address');
            $table->string('user_id');
            $table->softDeletes('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_compenies');
    }
};
