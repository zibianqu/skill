<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkillActiveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skill_active', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 200)->default('')->index('title')->comment('活动标题');
			$table->text('descript', 65535)->nullable()->index('descript')->comment('活动描述');
			$table->integer('start_time')->default(0)->index('start_time')->comment('活动开始时间');
			$table->integer('end_time')->default(0)->index('end_time')->comment('活动结束时间');
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
		Schema::drop('skill_active');
	}

}
