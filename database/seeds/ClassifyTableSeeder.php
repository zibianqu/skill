<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class ClassifyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $classify=DB::table('classify')->get();
        foreach ($classify as $key=>$val)
        {
            Redis::sadd('seeder_classify',$val->id);
        }
        factory(App\Models\Classify::class, 20)->create();
    }
}
