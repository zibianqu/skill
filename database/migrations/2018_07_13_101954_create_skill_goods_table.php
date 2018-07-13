<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkillGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skill_goods', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('active_id')->default(0)->index('active_id')->comment('活动id');
			$table->integer('goods_id')->default(0)->index('goods_id')->comment('商品id');
			$table->boolean('type')->default(0)->comment('商品来源');
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
		Schema::drop('skill_goods');
	}

}
