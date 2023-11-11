<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        dropForeignKeyIfExists('website_staff_applications', 'user_id');
        dropForeignKeyIfExists('website_staff_applications', 'rank_id');

        if (config('habbo.migrations.rename_tables') && Schema::hasTable('website_staff_applications')) {
            Schema::rename('website_staff_applications', sprintf('website_staff_applications_%s', time()));
        }

        Schema::create('website_staff_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('rank_id');
            $table->text('content');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('players')->cascadeOnDelete();
            $table->foreign('rank_id')->references('id')->on('server_permissions_ranks')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_staff_applications');
    }
};
