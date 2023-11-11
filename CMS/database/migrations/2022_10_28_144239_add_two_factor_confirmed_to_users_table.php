<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('players', function (Blueprint $table) {
            if (columnExists('players', 'two_factor_confirmed')) {
                Schema::dropColumns('players', 'two_factor_confirmed');
            }

            $table->boolean('two_factor_confirmed')
                ->after('two_factor_recovery_codes')
                ->default(false);
        });
    }
};
