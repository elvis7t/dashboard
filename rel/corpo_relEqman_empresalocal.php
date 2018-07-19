<?php
require_once("../class/class.functions.php");
require_once("../model/recordset.php");


	$rs_rel = new recordset();
	  
	$func 	= new functions();
	/*echo "<pre>";
	print_r($_GET);
	echo "</pre>";*/
	extract($_GET);
	$campo = "man_dataida"; 
	
	$sql = "SELECT  * FROM ".$tabela."  a
			JOIN  at_equipamentos  b ON a.man_eqId   = b.eq_id 
			JOIN  eq_prestadoras   c ON a.man_preId  = c.pre_id 
			JOIN  sys_usuarios     d ON a.man_usucad = d.usu_cod
			JOIN  at_empresas      e ON a.man_eqempId = e.emp_id
			
		WHERE man_eqempId =".$sel_emp;   
	if(isset($di) AND $di<>""){
		$sql.=" AND ".$campo." >='".$func->data_usa($di)." 00:00:00'"; 
		$filtro.= "Data Inicial: ".$di."<br>";
	}
	if(isset($df) AND $df<>""){
		$sql.=" AND ".$campo." <='".$func->data_usa($df)." 23:59:59'";
		$filtro.= "Data Final: ".$df."<br>";
	}
	
	
	$sql.=" ORDER BY man_dataida  ";   
	
	
	$rs_rel->FreeSql($sql);   
	
	while($rs_rel->GeraDados()): 
	 
	?>
	<tr>
		<td><?=$rs_rel->fld("emp_alias");?></td> 
		<td><?=$rs_rel->fld("eq_desc");?></td>
	    <td><?=$rs_rel->fld("man_motivo");?></td>
		<td><?=$rs_rel->fld("pre_alias");?></td>
		<td><?=$func->data_hbr($rs_rel->fld("man_dataida"));?></td>  
		<td><?=$func->data_br($rs_rel->fld("man_dataretorno"));?></td>  
		<td><?=$rs_rel->fld("usu_nome");?></td>
		<td><?=$rs_rel->fld("man_os");?></td>
		<td><?=$func->formata_din($rs_rel->fld("man_valor"));?></td>   
		<td><?php if($rs_rel->fld("man_ativo")==0 ): ?>
					Encerrado

					<?php else: ?>
 
					Aberto
	

					<?php

					endif;

					?> 	
		</td> 	
		
	</tr>
	<?php endwhile;
	echo "<tr><td><strong>".$rs_rel->linhas." Registros</strong></td></tr>";
	echo "<tr><td><address>".$filtro."</address></td></tr>";
	$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId = ".$sel_emp;
	if(isset($di) AND $di<>""){
		$sql.=" AND ".$campo." >='".$func->data_usa($di)." 00:00:00'"; 
		$filtro.= "Data Inicial: ".$di."<br>";
	}
	if(isset($df) AND $df<>""){
		$sql.=" AND ".$campo." <='".$func->data_usa($df)." 23:59:59'";
		$filtro.= "Data Final: ".$df."<br>";
	}
    $rs_rel->FreeSql($sql);
    while($rs_rel->GeraDados()){ $man =$func->formata_din( $rs_rel->fld("SUM(man_valor)")); }
	
	echo "<tr><td><strong>Total ".$man ."</strong></td></tr>"; 
 
	
	?>
	