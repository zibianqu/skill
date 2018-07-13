<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_info', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('order_id', 100)->default('')->unique('order_id')->comment('订单id');
			$table->text('order_info', 65535)->comment('订单信息');
			$table->integer('record_time')->default(0)->index('record_time')->comment('记录时间');
			$table->integer('update_time')->nullable()->default(0)->index('update_time')->comment('最后修改时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_info');
	}

}
