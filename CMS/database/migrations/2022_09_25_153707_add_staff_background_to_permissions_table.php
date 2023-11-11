<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('server_permissions_ranks', function (Blueprint $table) {
            if (columnExists('server_permissions_ranks', 'staff_background')) {
                Schema::dropColumns('server_permissions_ranks', 'staff_background');
            }

            $table->string('staff_background')->default('staff-bg.png')->after('staff_color');
        });
    }

    public function down(): void
    {
        Schema::table('server_permissions_ranks', function (Blueprint $table) {
        });
    }
};
