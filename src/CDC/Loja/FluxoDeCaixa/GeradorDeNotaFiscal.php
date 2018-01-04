<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\Pedido,
	CDC\Loja\FluxoDeCaixa\NFDao,
	CDC\Loja\FluxoDeCaixa\SAP;
use DateTime;

class GeradorDeNotaFiscal
{
	private $acoes;

	public function __construct($acoes = null)
	{
		$this->acoes = $acoes;
	}

	public function gera(Pedido $pedido)
	{
		return new NotaFiscal(
			$pedido->getCliente(),
			$pedido->getValorTotal() * 0.94,
			new DateTime()
		);

		foreach ($this->acoes as $acao) {
			$acao->executa($nf);	
		}
		
		return $nf;
	}
}
?>
