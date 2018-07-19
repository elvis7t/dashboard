<?php
require_once("../class/class.functions.php");
require_once("../model/recordset.php");


	$rs_rel = new recordset();
	
	$func 	= new functions();
	/*echo "<pre>";
	print_r($_GET);
	echo "</pre>";*/
	extract($_GET);
	
	
	$sql = "SELECT * FROM ".$tabela."   a
			JOIN at_empresas    	b ON a.mq_empId    = b.emp_id 
			JOIN mq_fabricante  	c ON a.mq_fabId    = c.fab_id
			JOIN sys_usuarios   	d ON a.mq_usucad   = d.usu_cod
			JOIN eq_tipo        	e ON a.mq_tipoId   = e.tipo_id
						 
		WHERE mq_ativo <> 1 ";  
	
	
	
	$sql.=" ORDER BY emp_alias  "; 
	
	
	
	$rs_rel->FreeSql($sql); 
	
	while($rs_rel->GeraDados()):  
	
	?>
	
	
	<tr>
		<td><?=$rs_rel->fld("mq_id");?></td>
		<td><?=$rs_rel->fld("emp_alias");?></td>
		<td><?=$rs_rel->fld("fab_nome");?></td>
		<td><?=$rs_rel->fld("tipo_desc");?></td>
		<td><?=$rs_rel->fld("mq_modelo");?></td>
		<td><?=$rs_rel->fld("mq_nome");?></td> 
		<td><img src="../images/qrcode_img/<?=$rs_rel->fld("mq_id");?>mq.png" /></td>
		
	</tr>
	<?php endwhile;
	echo "<tr><td><strong>".$rs_rel->linhas." Registros</strong></td></tr>";
	echo "<tr><td><address>".$filtro."</address></td></tr>";

	
	?>
	