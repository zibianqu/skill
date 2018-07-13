<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_info', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('goods_id')->default(0)->unique('goods_id')->comment('商品id');
			$table->text('goods_info', 65535)->comment('商品 信息');
			$table->integer('record_time')->default(0)->index('record_time')->comment('记录时间');
			$table->integer('update_time')->default(0)->index('update_time')->comment('最后记录时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_info');
	}

}
