<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WebsiteArticle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WebsiteArticleSeeder extends Seeder
{
    public function run(): void
    {

        $title = 'Atom CMS has been installed';
        $slug = Str::slug($title);

    }
}
