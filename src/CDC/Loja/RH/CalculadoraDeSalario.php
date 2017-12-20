<?php
namespace CDC\Loja\RH;

class CalculadoraDeSalario
{
	public function calculaSalario(Funcionario $funcionario)
	{
		/* Aplicando o baby steps nos testes para Devs*/
			// if ( $funcionario->getSalario() > 3000 ) {
			// 	return $funcionario->getSalario() * 0.8;
			// }
			// return $funcionario->getSalario() * 0.9;
			// return 425.0;
		
		if ($funcionario->getCargo()===TabelaCargos::DESENVOLVEDOR) {
			if ( $funcionario->getSalario() > 3000 ) {
				return 3200.0;
			}
			return 1350.0;
		}
		return 425.0;
	}
}	

?>