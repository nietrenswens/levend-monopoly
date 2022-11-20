<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gebouwen')->insert([
            'naam' => 'Metro centrum',
            'uuid' => 'c725d11d-c6ea-411f-8142-d54ca76b25b6',
            'prijs' => 200
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Theater de Stoep',
            'uuid' => '57047b24-28b7-4d35-a8e5-41ca70dc23c3',
            'prijs' => 350
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Spijkenisse brug',
            'uuid' => 'e815e090-c2b9-4b6a-a7ad-200a3a0136a1',
            'prijs' => 500
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Plateau',
            'uuid' => '8595dd84-c280-4599-8542-5e672302f82b',
            'prijs' => 600
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Metrostation de Akkers',
            'uuid' => 'eb35158e-71ee-48ac-8276-352ea2ef6f1a',
            'prijs' => 100
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Spijkenisse Medisch Centrum',
            'uuid' => '48d1e560-a08f-4939-8e78-15ccea3bab8b',
            'prijs' => 600
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Bioscoop Spijkenisse',
            'uuid' => '0d20841a-77d7-4542-b744-6c9cf82c507d',
            'prijs' => 400
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Spijkenisse Dorpskerk',
            'uuid' => '91e5891e-587a-4843-b7d4-d9301b756f47',
            'prijs' => 200
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Zuidland Kerk',
            'uuid' => '13d2efd6-617a-4ff3-90e2-77bbf17e5651',
            'prijs' => 250
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Bernissesteyn',
            'uuid' => '92f0e0c5-65b2-4d4f-b304-20e492b563f7',
            'prijs' => 400
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Albert Heijn Heenvliet',
            'uuid' => '9c32b343-142e-4469-84d2-d85d9329eab2',
            'prijs' => 250
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Paardenmarkt Heenvliet',
            'uuid' => '255e11cc-b24e-43c6-abef-7ecee55a56d4',
            'prijs' => 600
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Botlekbrug',
            'uuid' => '7307fa53-4ddc-4d48-9b99-a47163a9427b',
            'prijs' => 800
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Metrostation Heemraadlaan',
            'uuid' => 'de43779a-eb93-4dd8-810b-7e989a5fc834',
            'prijs' => 250
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Rivierabad',
            'uuid' => '99bc9503-1810-4d45-9acb-8cb27793ec59',
            'prijs' => 250
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Boekenberg',
            'uuid' => '16fa55af-aa4d-4daa-9744-b3e1cdf4fdc6',
            'prijs' => 250
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'McDonald\'s Spijkenisse',
            'uuid' => 'ff05fccc-4e65-4ab6-8300-ac7c13bc5640',
            'prijs' => 400
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Metrostation Spijkenisse',
            'uuid' => 'd70f39b8-4216-41e5-8193-cf5821973583',
            'prijs' => 400
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Café Merz',
            'uuid' => 'a267da3e-ea1d-418f-9d6c-2b2d82847632',
            'prijs' => 150
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Burgerking Spijkenisse',
            'uuid' => '03a7c72a-a7cd-4754-9fc8-77e0c755ae9c',
            'prijs' => 400
        ]);
        DB::table('gebouwen')->insert([
            'naam' => 'Jumbo Groenewoud',
            'uuid' => '0cd5a3ee-e5e1-44e3-b02c-282e0170d041',
            'prijs' => 250
        ]);

    }
}
