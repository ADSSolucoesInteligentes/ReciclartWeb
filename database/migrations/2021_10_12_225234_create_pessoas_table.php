<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePessoasTable.
 */
class CreatePessoasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pessoas', function(Blueprint $table) {
            $table->increments('idPessoa');

            $table->string('cpf_cnpj');
            $table->boolean('tipo');
            $table->string('ramo');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('ciadade');
            $table->string('uf');
            $table->string('retira');

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
		Schema::drop('pessoas');
	}
}
