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
            ['value' => 'Alsace'],
            ['value' => 'Aquitaine'],
            ['value' => 'Centre'],
            ['value' => 'Corse'],
            ['value' => 'Limousin']
        ]);
    }
}
