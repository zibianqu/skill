<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('email', 50)->default('')->unique('email_i')->comment('邮箱');
			$table->string('name', 50)->index('name_i');
			$table->boolean('type')->default(0)->comment('1普通用户,2商户');
			$table->integer('record_time')->default(0)->index('record_time_i')->comment('记录时间');
			$table->integer('update_time')->default(0)->index('update_time_i')->comment('修改时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
