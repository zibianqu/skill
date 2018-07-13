<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('goods_name', 100)->default('')->index('goods_name')->comment('商品名称');
			$table->string('shop_id', 50)->default('')->index('shop_id')->comment('商铺id');
			$table->string('goods_no', 50)->default('')->unique('goods_no')->comment('商品编号');
			$table->integer('goods_type')->default(0)->index('goods_type')->comment('商品类型');
			$table->integer('goods_num')->unsigned()->default(0)->comment('商品数量');
			$table->decimal('goods_price', 10)->unsigned()->default(0.00)->comment('商品价格');
			$table->boolean('status')->default(1)->comment('1为上架，0为下架');
			$table->integer('record_time')->default(0)->index('record_time')->comment('记录时间');
			$table->integer('update_time')->nullable()->default(0)->index('update_time')->comment('修改时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods');
	}

}
