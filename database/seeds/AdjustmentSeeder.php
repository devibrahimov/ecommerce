<?php

use Illuminate\Database\Seeder;

class AdjustmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('adjustment')->insert([
            'multilang' => 0,
            'default_lang' => 'az',
            'modules' => null
        ]);
    }
}
