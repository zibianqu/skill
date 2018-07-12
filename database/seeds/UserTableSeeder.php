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
        Redis::del('email');
        factory(App\Models\User::class, 50)->create();
    }
}
