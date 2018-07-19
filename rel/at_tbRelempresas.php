<?php
require_once("../model/recordset.php");
$rs_rel = new recordset();
$sql ="SELECT * FROM at_empresas
		WHERE emp_id <> 0";  
$rs_rel->FreeSql($sql);
if($rs_rel->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Empresa...</td></tr>"; 
	else:
while($rs_rel->GeraDados()){ ?>
	<tr>
		<td><?=$rs_rel->fld("emp_id");?></td>
		<td><?=$rs_rel->fld("emp_nome");?></td>
		<td><?=$rs_rel->fld("emp_alias");?></td>
		<td><?=$rs_rel->fld("emp_cnpj");?></td> 
		<td>
			<div class="button-group">
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='M&aacute;quinas ativas' a href="cabecario_rel_Mqempresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs_rel->fld('emp_id');?>"><i class="fa fa-desktop"></i></a>
				<a 	class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Equipamentos Ativos' a href="cabecario_rel_Eqempresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs_rel->fld('emp_id');?>"><i class="fa fa-keyboard-o"></i></a>
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='M&aacute;quinas descartadas' a href="cabecario_rel_Mqdes_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs_rel->fld('emp_id');?>"><i class="fa fa-recycle"></i></a>
				<a 	class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Equipamentos descartados' a href="cabecario_rel_Eqdes_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs_rel->fld('emp_id');?>"><i class="fa fa-recycle"></i></a>     
				<a 	class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='bottom' title='Manuten&ccedil;&atilde;o de equipamentos' a href="cabecario_rel_Eqman_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs_rel->fld('emp_id');?>"><i class="fa fa-exclamation-triangle"></i></a>     
				
			</div>
		</td>    
		  
	</tr>	
<?php  
}
//echo "<tr><td colspan=7><strong>".$rs_rel->linhas." Empresas Cadastradas</strong></td></tr>";    
endif;
?>     