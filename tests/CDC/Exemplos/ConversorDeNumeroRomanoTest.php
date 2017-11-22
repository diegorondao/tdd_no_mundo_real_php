<?php

namespace CDC\Exemplos;

use CDC\Exemplos\ConversorDeNumeroRomano;
use PHPUnit\Framework\TestCase;

class ConversorDeNumeroRomanoTest extends TestCase
{
	public function testDeveEntenderOSimboloI()
	{
		$romano = new ConversorDeNumeroRomano();
		$numero = $romano->converte("I");
		$this->assertEquals(1, $numero);
	}

	// Ex: II
	public function testDeveEntenderOSimboloII()
	{
		$romano = new ConversorDeNumeroRomano();
		$numero = $romano->converte("II");
		$this->assertEquals(2, $numero);
	}

	// Ex: XXII,
	public function testDeveEntenderOSimboloXXII()
	{
		$romano = new ConversorDeNumeroRomano();
		$numero = $romano->converte("XXII");
		$this->assertEquals(22, $numero);
	}

	// Ex: IX,
	public function testDeveEntenderOSimboloIX()
	{
		$romano = new ConversorDeNumeroRomano();
		$numero = $romano->converte("IX");
		$this->assertEquals(9, $numero);
	}

	// Ex: XXIV,
	public function testDeveEntenderOSimboloXXIV()
	{
		$romano = new ConversorDeNumeroRomano();
		$numero = $romano->converte("XXIV");
		$this->assertEquals(24, $numero);
	}
}
?>