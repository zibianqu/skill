<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        die('请注释我');
        Redis::del('email');
        factory(App\Models\User::class, 10000)->create();
    }
}
