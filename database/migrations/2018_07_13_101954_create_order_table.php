<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('order_id', 100)->default('')->unique('order_id')->comment('订单号');
			$table->integer('user_id')->default(0)->index('user_id')->comment('用户id');
			$table->integer('goods_id')->default(0)->index('goods_id')->comment('商品id');
			$table->string('goods_name', 50)->default('')->index('goods_name')->comment('商品名称');
			$table->integer('count')->default(0)->comment('购买数量');
			$table->decimal('price', 10)->default(0.00)->comment('商品价格');
			$table->decimal('all_price', 10)->default(0.00)->comment('购买总价格');
			$table->boolean('is_pay')->default(0)->comment('0未付款，1付款，2退款');
			$table->boolean('send_goods')->default(0)->comment('0未发货，1已发货，2已收货，3已退货');
			$table->boolean('is_finished')->default(0)->comment('0订单未完成，1订单已完成(或失效）');
			$table->integer('record_time')->default(0)->index('record_time')->comment('订单记录时间');
			$table->integer('update_time')->default(0)->index('update_time')->comment('订单最后修改时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order');
	}

}
