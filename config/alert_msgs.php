<?php
require_once("../controller/acao_graficos.php");
require_once("../model/recordset.php");
?>
	
	<!-- Notifications: style can be found in dropdown.less -->
	<?php
	
	$sql ="	SELECT empre_id, empre_eqdesc FROM eq_emprestimo a
			JOIN at_empresas      b ON a.empre_eqempId    = b.emp_id 
			JOIN eq_tipo          c ON a.empre_eqtipoId = c.tipo_id
			JOIN eq_marca         d ON a.empre_eqmarcaId   = d.marc_id
			JOIN at_equipamentos  e ON a.empre_eqId     = e.eq_id
			JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
			JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
			JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
			
		WHERE empre_ativo = '1'
		
		UNION ALL
		SELECT empre_id, empre_mqnome FROM 	mq_emprestimo a
			JOIN at_empresas      b ON a.empre_mqempId    = b.emp_id 
			JOIN eq_tipo          c ON a.empre_eqtipoId = c.tipo_id
			JOIN mq_fabricante    d ON a.empre_mqfabId   = d.fab_id
			JOIN at_maquinas      e ON a.empre_mqId     = e.mq_id
			JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
			JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
			JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
			
		WHERE empre_ativo = '1'	
		
		";
		$rs->FreeSql($sql);
		?>
	<li class="dropdown notifications-menu">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		  <i class="fa fa-exchange"></i>
		  <span class="label label-warning"><?=$rs->linhas;?></span>
		</a>
		<ul class="dropdown-menu">
		  <li class="header"> Emprestimos <?=$rs->linhas;?></li>
		  <li>
			<!-- inner menu: contains the actual data -->
			<ul class="menu">
				<?php
				$rs->FreeSql($sql);
				while($rs->GeraDados()){
				?>
			  <li>
				<a href="at_ger_Eqemprestimo.php?token=<?=$_SESSION['token']?>&acao=N&empreid=<?=$rs->fld('empre_id');?>">
				  <i class="glyphicon glyphicon-retweet text-aqua"></i> <?=$rs->fld("empre_id")." - ".$rs->fld("empre_eqdesc");?>
				</a>
			  </li>
			  <li>
			  <?php 
				}
			   ?>
				
			</ul>
		  </li>
		  <li class="footer"><a href="at_emprestimo.php?token=<?=$_SESSION['token'];?>">Ver Todos</a></li>
		</ul>
	</li>		
			<!-- Tasks: style can be found in dropdown.less -->
	<li class="dropdown tasks-menu">
	<?php
	
	$sql ="	SELECT * FROM at_compras a
			JOIN  at_departamentos   c ON a.comp_dpId  = c.dp_id 
			JOIN  sys_usuarios       d ON a.comp_usucad = d.usu_cod
			JOIN  at_empresas        e ON a.comp_empId = e.emp_id
			JOIN  comp_status        f ON a.comp_statusId = f.status_id
			
			WHERE comp_ativo = '1'";
		$rs->FreeSql($sql);
		?>
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		  <i class="glyphicon glyphicon-shopping-cart"></i>
		  <span class="label label-danger"><?=$rs->linhas;?></span>
		</a>
		<ul class="dropdown-menu">
		  <li class="header">Compras <?=$rs->linhas;?></li>
		  <li>
			<!-- inner menu: contains the actual data -->
			<ul class="menu">
				<?php
				$rs->FreeSql($sql);
				while($rs->GeraDados()){
				?>
			  <li>
				<a href="at_ver_Compra.php?token=<?=$_SESSION['token']?>&acao=N&compid=<?=$rs->fld('comp_id');?>">
				  <i class="glyphicon glyphicon-shopping-cart text-green"></i><?=$rs->fld("comp_id")." - ".$rs->fld("comp_titulo");?>
				</a>
			  </li>
			  <li>
			  <?php 
				}
			   ?>
			  <!-- end task item -->			  
			</ul>
		  </li>
		  <li class="footer">
			<a href="at_compras.php?token=<?=$_SESSION['token'];?>">Ver Todos</a>
		  </li>
		</ul>
	</li>
	
	<!-- Messages: style can be found in dropdown.less-->
	<li class="dropdown messages-menu">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		  <i class="fa fa-envelope-o"></i>
		  <span class="label label-success">4</span>
		</a>
		<ul class="dropdown-menu">
		  <li class="header">You have 4 messages</li>
		  <li>
			<!-- inner menu: contains the actual data -->
			<ul class="menu">
			  <li><!-- start message -->
				<a href="#">
				  <div class="pull-left">
					<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				  </div>
				  <h4>
					Support Team
					<small><i class="fa fa-clock-o"></i> 5 mins</small>
				  </h4>
				  <p>Why not buy a new awesome theme?</p>
				</a>
			  </li>
			  <!-- end message -->
			  <li>
				<a href="#">
				  <div class="pull-left">
					<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
				  </div>
				  <h4>
					AdminLTE Design Team
					<small><i class="fa fa-clock-o"></i> 2 hours</small>
				  </h4>
				  <p>Why not buy a new awesome theme?</p>
				</a>
			  </li>
			  <li>
				<a href="#">
				  <div class="pull-left">
					<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
				  </div>
				  <h4>
					Developers
					<small><i class="fa fa-clock-o"></i> Today</small>
				  </h4>
				  <p>Why not buy a new awesome theme?</p>
				</a>
			  </li>
			  <li>
				<a href="#">
				  <div class="pull-left">
					<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
				  </div>
				  <h4>
					Sales Department
					<small><i class="fa fa-clock-o"></i> Yesterday</small>
				  </h4>
				  <p>Why not buy a new awesome theme?</p>
				</a>
			  </li>
			  <li>
				<a href="#">
				  <div class="pull-left">
					<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
				  </div>
				  <h4>
					Reviewers
					<small><i class="fa fa-clock-o"></i> 2 days</small>
				  </h4>
				  <p>Why not buy a new awesome theme?</p>
				</a>
			  </li>
			</ul>
		  </li>
		  <li class="footer"><a href="#">See All Messages</a></li>
		</ul>
	</li>
					    