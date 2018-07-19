<?php
	<body onload="window.print();">
		<div class="wrapper">
			<!-- Main content -->
			<section class="invoice">
				<!-- title row --> 
				<div class="row">
				  <div class="col-xs-12">
					<h2 class="page-header">
					 <?php
				
								$rs_rel = new recordset();
								$sql ="SELECT * FROM at_empresas
										WHERE emp_id=".$_SESSION['usu_empresa']; 
								$rs_rel->FreeSql($sql);
								$rs_rel->GeraDados();   
								?>
						<small class="pull-left"><img class="profile-user-img img-responsive img-circle" src="<?=$hosted."/".$rs_rel->fld('emp_logo');?>" alt="Logo da Empresa"></small> 
							<?=$rs_rel->fld("emp_nome");?>  
						<small class="pull-right">Data: <?=date("d/m/Y");?></small>
					</h2>
				  </div><!-- /.col -->
				</div>   
				<!-- info row -->
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
						Usu&aacute;rio
						<address>
							<strong><?=$_SESSION['nome_usu'];?></strong><br>
							<i class="fa fa-envelope"></i> <?=$_SESSION['usuario'];?>
						</address>
					</div><!-- /.col -->
				</div><!-- /.row -->
 
				<!-- Table row -->
				<div class="row">
					<div class="col-xs-12 table-responsive">
						<table class="table table-striped">
							<thead>
								   <tr><th colspan=7><h2>Relat&oacute;rio de Equipamentos Descartados</h2></th></tr>
									  <tr> 
										
										
										<th>Empresa</th> 
										<th>Tipo</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Equipamento</th>
										<th>Valor</th>
										<th>Descartado por:</th> 
										<th>Comprado em:</th>
										<th>Descartado em:</th> 
										<th>Vida &Uacute;til</th>
										
										
										
								</tr>
							</thead>
							<tbody id="rls">
								<?php
									require_once("corpo_rel_eqdesc.php");
								?>
							</tbody>
						</table>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</section><!-- /.content -->
		</div><!-- ./wrapper -->

		<!-- AdminLTE App -->
		<script src="<?=$hosted;?>/assets/dist/js/app.min.js"></script>
	</body>
</html>