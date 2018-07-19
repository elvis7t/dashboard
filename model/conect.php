<?php
/* fun��o que conecta o banco de dados
@author 	Cleber Marrara Prado
@version 	1.0
*/

require_once("config.php");
//Abre Conexao com mysql
function conecta(){
	$link = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());
	mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
	return $link;
}

function desconecta($link){
	mysqli_close($link);
}

?>