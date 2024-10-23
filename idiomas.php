<?php
 

	 $idiomaES = '';

	if(isset($_GET['id']))
	{
		$id_idioma = trim($_GET['id']);
	}
	else
	{
		$id_idioma = 'pt';
		$idiomaPT = 'btn-primary active';
	}
	
	switch($id_idioma)
	{
		case('pt'):
			$idioma = 'port.php';
			$idiomaPT = 'btn-primary active';
		break;

		case('es'):
			$idioma = 'span.php';
			$idiomaES = 'btn-primary active';
		break;

		case('in'):
			$idioma = 'ingles.php';
		break;
	}
	include($idioma);

?>
