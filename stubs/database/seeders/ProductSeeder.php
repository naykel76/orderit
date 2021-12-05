<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Naykel\Orderit\Models\Product;

class ProductSeeder extends Seeder
{

    public function run()
    {
        Product::create([
            'name' => 'Some Product',
            'code' => 'sfp-abcX',
            'headline' => 'Product headline to get the users attention.',
            'image_name' => 'naykel-400.png',
            'price' => 4.99,
            'qoh' => 6,
            'published_at' => now(),
        ]);
        Product::create([
            'name' => 'Another Product',
            'code' => 'sfp-abc',
            'headline' => 'Product headline to get the users attention.',
            'image_name' => 'naykel-400.png',
            'price' => 87.50,
            'qoh' => 6,
            'published_at' => now(),
        ]);
        Product::create([
            'name' => 'Yet Another Product',
            'code' => 'sfp-abcXY',
            'headline' => 'Product headline to get the users attention.',
            'image_name' => 'naykel-400.png',
            'price' => 848.00,
            'qoh' => 0,
            'published_at' => now(),
        ]);

        Product::factory(100)->create();
    }
}
