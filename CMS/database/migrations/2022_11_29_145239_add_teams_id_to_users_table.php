<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        dropForeignKeyIfExists('players', 'team_id');

        if (Schema::hasColumn('players', 'team_id')) {
            Schema::dropColumns('players', 'team_id');
        }

        Schema::table('players', function (Blueprint $table) {
            if (!Schema::hasColumn('players', 'team_id')) {
                $table->unsignedBigInteger('team_id')->nullable();
            }

            $table->foreign('team_id')->references('id')->on('website_teams')->nullOnDelete();
        });
    }
};
