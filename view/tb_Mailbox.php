<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");  
$fn = new functions();
$rs_user = new recordset();
$sql ="SELECT * FROM ou_contato_site 
		WHERE contato_Id <> 0";
			
	$rs_user->FreeSql($sql);
	$ou_contato_Id = $rs_user->fld("contato_id");
	if($rs_user->linhas==0):
	echo "<tr><td colspan=7> Nenhuma solicita&ccedil;&atilde;o...</td></tr>";
	else:
		while($rs_user->GeraDados()){?> 
		<tr>
			<td><input type="checkbox"></td>
			<td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
			<td class="mailbox-name"><a href=""></a></td><td class="mailbox-name"><a href="ou_vis_msn.php?token=<?=$_SESSION['token'];?>&contato_Id=<?=$rs_user->fld("contato_Id");?>"><?=$rs_user->fld("contato_nome");?></a></td>
			<td class="mailbox-subject"><b<?=$rs_user->fld("contato_titulo");?></b> - <?=$rs_user->fld("contato_mensagem");?></td>
			<td class="mailbox-attachment">
			<?php $sql ="SELECT * FROM ou_contato_site a  
						JOIN ou_imagens b ON a.contato_Id = b.img_contatoId
						WHERE contato_Id =".$ou_contato_Id;
			?>
			
			<?php if($rs_user->fld("img_ender")<> " ") ?>
								
							
								
			 <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
			</td>
			<td class="mailbox-date"><?=$fn->data_hbr($rs_user->fld("contato_data"));?></td>		
		</tr>
			  <?php                     
             
	}endif;
?>