<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');
        foreach (range(1, 4) as $index) {
            DB::table('categories')->insert([
              'name' => $faker->company,
              'slug' => $faker->slug
            ]);
        }

        $faker = Faker::create('ru_RU');
        foreach (range(1,10) as $index) {
            DB::table('countries')->insert([
              'name' => $faker->country
            ]);
        }

        $faker = Faker::create('ru-RU');
        foreach (range(1, 10) as $item) {
            DB::table('drinks')->insert([
                'category_id' => $faker->numberBetween($min = 1, $max = 4),
                'name' => $faker->company,
                'manufacture' => $faker->company,
                'country_id' => $faker->numberBetween($min = 2, $max = 10),
                'provider' => $faker->company,
                'capacity' => '0.33',
                'madeDate' => $faker->dateTime,
                'price' => $faker->randomDigit,
                'count' => $faker->numberBetween($min = 300, $max = 10000),
                'status' => 'в наличии'
            ]);
        }

         $faker = Faker::create('ru-RU');
        foreach (range(1, 10) as $item) {
            DB::table('books')->insert([
                'title' => $faker->company,
                'author' => $faker->name,
                'publish' => $faker->company,
                'year' => $faker->dateTime,
                'genre' => $faker->company,
                'price' => $faker->randomDigit,
                'count' => $faker->numberBetween($min = 300, $max = 10000),
                'status' => 'в наличии'
            ]);
        }
    }
}
