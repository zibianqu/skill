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
			$table->string('name', 100)->index('name_i');
			$table->integer('record_time')->default(0)->index('record_time_i')->comment('记录时间');
			$table->integer('update_time')->default(0)->index('update_time_')->comment('最后修改时间');
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
