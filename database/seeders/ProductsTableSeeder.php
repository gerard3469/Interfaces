<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $products = [];
        for ($i = 0; $i < 500; $i++) {
            $products[] = [
                'product' => $faker->word,
                'description' => $faker->sentence,
                'unit' => $faker->word,
                'status' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }
}
