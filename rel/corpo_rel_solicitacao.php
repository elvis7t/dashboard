<?php
	$sql = "SELECT * FROM ".$tabela."  a
		WHERE solic_id <> 0";
	$sql.=" ORDER BY emp_alias  ";   
	