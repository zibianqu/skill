<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->default(0)->unique('user_id')->comment('商户的用户id');
			$table->string('name', 100)->index('name');
			$table->integer('record_time')->default(0)->index('record_time')->comment('记录时间');
			$table->integer('update_time')->default(0)->index('update_time')->comment('最后修改时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shop');
	}

}
