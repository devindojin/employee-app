<?php

use Illuminate\Database\Seeder;

class LocalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('locals')->insert([
            ['value' => 'Auvergne-Rhône-Alpes'],
            ['value' => 'Bourgogne-Franche-Comté'],
            ['value' => 'Bretagne'],
            ['value' => 'Centre-Val de Loire'],
            ['value' => 'Grand Est'],
            ['value' => 'Hauts-de-France'],
            ['value' => 'Île-de-France'],
            ['value' => 'Normandie'],
            ['value' => 'Nouvelle-Aquitaine'],
            ['value' => 'Occitanie'],
            ['value' => 'Pays de la Loire'],
            ['value' => 'Provence-Alpes-Côte d Azur']
        ]);
    }
}
