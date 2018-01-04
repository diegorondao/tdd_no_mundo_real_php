<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\Pedido,
	CDC\Exemplos\RelogioInterface,
	CDC\Loja\Tributos\TabelaInterface;

use DateTime;

class GeradorDeNotaFiscal
{
	private $acoes;
	private $relogio;
	private $tabela;

	public function __construct($acoes, RelogioInterface $relogio, TabelaInterface $tabela)
	{
		$this->acoes = $acoes;
		$this->relogio = $relogio;
		$this->tabela = $tabela;
	}

	public function gera(Pedido $pedido)
	{
		$valorTabela = $this->tabela->paraValor($pedido->getValorTotal());
		$valorTotal = $pedido->getValorTotal() * $valorTabela;
		
		$nf = new NotaFiscal(
			$pedido->getCliente(),
			$valorTotal,
			$this->relogio->hoje()
		);

		foreach ($this->acoes as $acao) {
			$acao->executa($nf);	
		}
		
		return $nf;
	}
}
?>
