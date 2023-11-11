<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('players', function (Blueprint $table) {
            $table->unsignedInteger('website_balance')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {
            //
        });
    }
};
