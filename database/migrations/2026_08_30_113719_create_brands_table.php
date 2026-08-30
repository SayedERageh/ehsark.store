<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {

            $table->id();

            // اسم البراند
            $table->string('name');

            // اللوجو / صورة البراند
            $table->string('image')->nullable();

            // رابط الموقع أو صفحة البراند
            $table->string('url')->nullable();

            // حالة البراند
            $table->boolean('status')->default(true);

            // ترتيب الظهور
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};