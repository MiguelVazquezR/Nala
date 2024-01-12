<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Galery;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'Password' => bcrypt('321321321'),
        ]);

        Category::create(
            [
                'name' => 'Collares y colgantes',
                'created_at' => now()
            ],
            [
                'name' => 'Pulseras',
                'created_at' => now()
            ],
            [
                'name' => 'Aretes',
                'created_at' => now()
            ],
            [
                'name' => 'Anillos',
                'created_at' => now()
            ],
            [
                'name' => 'Relojes',
                'created_at' => now()
            ],
        );

        Banner::create(); //Se crea el registro para guardar los banners en él
        Galery::create(); //Se crea el registro para guardar las imagenes en él
    }
}
