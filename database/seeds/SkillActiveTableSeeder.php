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
        //die("请注释我");
        factory(App\Models\SkillActive::class, 1)->create();
    }
}
