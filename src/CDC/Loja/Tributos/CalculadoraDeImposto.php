<?php
namespace CDC\Loja\Tributos;

use CDC\Loja\FluxoDeCaixa\Pedido,
	CDC\Loja\Tributos\TabelaInterface;

class CalculadoraDeImposto
{
	protected $tabela;
	public function __construct(TabelaInterface $tabela)
	{
		$this->tabela = $tabela;
	}
	public function calculaImposto(Pedido $pedido)
	{
		$taxa = $this->tabela->paraValor(
		$pedido->getValorTotal());
		return $pedido->getValorTotal() * $taxa;
	}
}