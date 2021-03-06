<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('customers', function(Blueprint $table) {
            $table->increments('id');
			$table->string('customer_name');
			$table->string('address');
			$table->string('city');
			$table->string('state', 2);
			$table->string('zip', 10);
			$table->timestamps('');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('customers');
	}

}
