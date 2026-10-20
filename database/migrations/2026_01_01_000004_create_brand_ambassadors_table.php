<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brand_ambassadors', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('profesi');
            $table->string('foto')->nullable();
            $table->text('bio')->nullable();
            $table->string('instagram')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_ambassadors');
    }
};
