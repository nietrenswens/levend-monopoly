<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChancecardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chancecards')->insert([
            'description' => 'Je hebt gewonnen in een boks wedstrijd. Je krijgt 400 euro.',
            'amount' => 400
        ]);
        DB::table('chancecards')->insert([
            'description' => 'Je hebt belegd in Sander N.V. en hebt 300 euro terug verdiend.',
            'amount' => 300
        ]);
        DB::table('chancecards')->insert([
            'description' => 'Je hebt een prijs gewonnen in een loterij. Je krijgt 500 euro.',
            'amount' => 500
        ]);
        DB::table('chancecards')->insert([
            'description' => 'Je hebt 100 euro op straat gevonden.',
            'amount' => 100
        ]);
        DB::table('chancecards')->insert([
            'description' => 'De politie is achter je witwaspraktijken aangekomen. Je moet 200 euro betalen.',
            'amount' => -200
        ]);
        DB::table('chancecards')->insert([
            'description' => 'Je hebt een boete gekregen voor het niet betalen van je belasting. Je moet 100 euro betalen.',
            'amount' => -100
        ]);
        DB::table('chancecards')->insert([
            'description' => 'Je hebt te hard gereden over de Groenekruisweg en je moet 500 euro boete betalen.',
            'amount' => -500
        ]);
        DB::table('chancecards')->insert([
            'description' => 'Je hebt de verkeerde kant op gereden op de A15 en je moet 200 euro boete betalen.',
            'amount' => -200
        ]);
    }
}
