<?php 
namespace CDC\Loja\Produto;

class Produto
{
	private $nome;
	private $valorUnitario;
	private $quantidade;
	private $descricao;
	private $status;
	
	function __construct($nome, $valorUnitario, $status = NULL, $quantidade = 1)
	{
		$this->nome = $nome;
		$this->valorUnitario = $valorUnitario;
		$this->quantidade = $quantidade;
		$this->descricao = $descricao;
		$this->status = $status;
	}

	function getNome()
	{
		return $this->nome;
	}

	function getValorUnitario()
	{
		return $this->valorUnitario;
	}

	function getQuantidade()
	{
		return $this->quantidade;
	}

	function getValorTotal()
	{
		return $this->valorUnitario * $this->quantidade;
	}

	function getDescricao()
	{
		return $this->nome;
	}

	function getStatus()
	{
		return $this->status;
	}
}


?>