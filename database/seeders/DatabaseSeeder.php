<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Produk;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Produk::create([
            'category_id' => 1,
            'name' => 'Banner Fl280',
            'code' => '1_banner_fl280_'.time(),
            'price' => 18000

        ]);

        Produk::create([
            'category_id' => 1,
            'name' => 'Banner Fl340',
            'code' => '1_banner_fl3400_'.time(),
            'price' => 24000

        ]);

        Produk::create([
            'category_id' => 2,
            'name' => 'Vynil Glossy',
            'code' => '2_vynilglossy_'.time(),
            'price' => 15000
        ]);

        Produk::create([
            'category_id' => 2,
            'name' => 'Vynil Doff',
            'code' => '2_vynildoff_'.time(),
            'price' => 14500
        ]);

        Produk::create([
            'category_id' => 3,
            'name' => 'Kalender isi 4 AP150',
            'code' => '3_kalenderisi4ap150'.time(),
            'price' => 14500
        ]);

        Produk::create([
            'category_id' => 2,
            'name' => 'AP150',
            'code' => '2_ap150'.time(),
            'price' => 7000
        ]);

        Produk::create([
            'category_id' => 2,
            'name' => 'AP230',
            'code' => '2_ap230'.time(),
            'price' => 7500
        ]);

        Category::create([
            'name' => 'Banner Outdoor',
            'slug' => 'banner-outdoor'
        ]);

        Category::create([
            'name' => 'Laser',
            'slug' => 'laser'
        ]);

        Category::create([
            'name' => 'Kalender',
            'slug' => 'kalender'
        ]);
    }
}
