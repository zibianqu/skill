<?php

use Illuminate\Database\Seeder;

class SkillActiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\SkilActive::class, 1)->create();
    }
}
