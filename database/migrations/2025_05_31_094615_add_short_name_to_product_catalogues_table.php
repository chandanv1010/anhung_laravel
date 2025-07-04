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
        Schema::table('product_catalogues', function (Blueprint $table) {
            $table->string('short_name')->nullable();
        });
    }

    
    public function down(): void
    {
        Schema::table('product_catalogues', function (Blueprint $table) {
            $table->dropColumn('short_name');
        });
    }
};
