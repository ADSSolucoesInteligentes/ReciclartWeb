<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePedidosTable.
 */
class CreatePedidosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table) {
            $table->increments('codPedido');

            $table->integer('codMaterial');
            $table->integer('codPessoa_solicitante');
            $table->integer('codPessoa_fornecedor');
            $table->dateTime('dataHoraAgndamento');
            $table->date('dataRetirada');
            $table->date('dataCancelamento');
            $table->string('situacaoPedido');

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
		Schema::drop('pedidos');
	}
}
