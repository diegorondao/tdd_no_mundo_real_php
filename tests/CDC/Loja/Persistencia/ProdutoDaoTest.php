<?php
namespace Loja\Persistencia;

use PHPUnit\Framework\TestCase;
	CDC\Loja\Persistencia\ConexaoComBancoDeDados,
	CDC\Loja\Persistencia\ProdutoDao,
	CDC\Loja\Produto\Produto;

class ProdutoDaoTest extends TestCase
{

	private $conexao;
	
	protected function setUp()
	{
		parent::setUp();
		$this->conexao = new PDO("sqlite:/tmp/test.db");
		$this->conexao->setAttribute(
		PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->criaTabela();
	}
	protected function criaTabela()
	{
		$sqlString = "CREATE TABLE produto ";
		$sqlString .= "(id INTEGER PRIMARY KEY, descricao TEXT, ";
		$sqlString .= "valor_unitario TEXT, status TINYINT(1) );";
	}	

	public function testDeveAdicionarUmProduto()
	{
		$conn = (new ConexaoComBancoDeDados())->getConexao();
		$produtoDao = new ProdutoDao($conn);
		$produto = new Produto("Geladeira", 150.0);
		$produtoDao->adiciona($produto);
		// como validar?
	}

	public function testDeveAdicionarUmProduto()
	{
		$conexao = (new ConexaoComBancoDeDados())->getConexao();
		$produtoDao = new ProdutoDao($conexao);
		
		$produto = new Produto("Geladeira", 150.0);
		
		// Sobrescrevendo a conexão para continuar trabalhando
		// sobre a mesma já instanciada
		$conexao = $produtoDao->adiciona($produto);
		
		// buscando pelo id para
		// ver se está igual o produto do cenário
		$salvo = $produtoDao->porId($conexao->lastInsertId());
		$this->assertEquals($salvo["descricao"], $produto->getDescricao());
		$this->assertEquals($salvo["valor_unitario"], $produto->getValorUnitario());
		$this->assertEquals($salvo["status"], $produto->getStatus());
	}

	public function testDeveFiltrarAtivos()
	{
		$produtoDao = new ProdutoDao($this->conexao);

		$ativo = new Produto("Geladeira", 150.0);
		$inativo = new Produto("Geladeira", 180.0);
		$inativo->inativa();
		
		$produtoDao->adiciona($ativo);
		$produtoDao->adiciona($inativo);
		
		$produtosAtivos = $produtoDao->ativos();
		
		$this->assertEquals(1, count($produtosAtivos));
		$this->assertEquals(150.0, $produtosAtivos[0]["valor_unitario"]);
	}

	// Removemos o banco 
	protected function tearDown()
	{
		parent::tearDown();
		unlink("/tmp/test.db");
	}
		
}
