<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassifyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classify', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 50)->default('')->index('name')->comment('分类名称');
			$table->integer('pid')->default(0)->index('pid')->comment('父级id');
			$table->integer('order')->default(0)->comment('排序');
			$table->boolean('status')->default(1)->comment('0未启用，1启用');
			$table->integer('record_time')->default(0)->comment('记录时间');
			$table->integer('update_time')->default(0)->comment('最后修改时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('classify');
	}

}
