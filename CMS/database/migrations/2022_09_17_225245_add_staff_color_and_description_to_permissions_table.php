<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('server_permissions_ranks', function (Blueprint $table) {
            if (columnExists('server_permissions_ranks', 'job_description')) {
                Schema::dropColumns('server_permissions_ranks', 'job_description');
            }

            if (columnExists('server_permissions_ranks', 'staff_color')) {
                Schema::dropColumns('server_permissions_ranks', 'staff_color');
            }

            $table->string('job_description')->default('Here to help')->after('badge');
            $table->string('staff_color', 8)->default('#327fa8')->after('job_description');
        });
    }
};
