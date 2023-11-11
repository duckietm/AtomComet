<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\WebsiteRareValue;
use App\Models\WebsiteRareValueCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->environment('local') && false) {
            WebsiteRareValueCategory::factory(4)->create();
            WebsiteRareValue::factory(20)->create();
        }

        $this->call([
            WebsiteSettingsSeeder::class,
            WebsiteLanguageSeeder::class,
            WebsiteArticleSeeder::class,
            WebsitePermissionSeeder::class,
            WebsiteWordfilterSeeder::class,
            WebsiteTeamSeeder::class,
            WebsiteRuleCategorySeeder::class,
            WebsiteRuleSeeder::class,
            WebsiteHelperCenterCategorySeeder::class,
            WebsiteShopArticleSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
