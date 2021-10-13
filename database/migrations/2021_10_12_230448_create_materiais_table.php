<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMateriaisTable.
 */
class CreateMateriaisTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materiais', function(Blueprint $table) {
            $table->increments('codMaterial');

            $table->integer('codPessoa');
            $table->string('tipo');
            $table->integer('quantidade');
            $table->text('situacaoMaterial');

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('materiais');
	}
}
