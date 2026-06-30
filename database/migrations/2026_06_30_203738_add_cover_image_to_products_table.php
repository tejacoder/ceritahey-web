<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('cover_image')->nullable()->after('price');
            $table->string('cover_image_path')->nullable()->after('cover_image');
            $table->string('image_alt')->nullable()->after('cover_image_path');
            $table->string('image_title')->nullable()->after('image_alt');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['cover_image', 'cover_image_path', 'image_alt', 'image_title']);
        });
    }
};
