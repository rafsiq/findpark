<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Carregamento do HEADER  -->
	<?php $this->load->view('_includes/administrativo/header') ?>
</head>
<body>
	<div id="wrapper">
		<!-- Carregamento do HEADER  -->
		<?php $this->load->view('_includes/administrativo/menu') ?>

		<div id="page-wrapper">
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2><i class="fa fa-clock-o"></i>&nbsp;<strong>Serviços</strong></h2>
					</div>
				</div>
				<hr>
				<br>
				<div class="row" id="container-error">
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<form class="form-inline" role="form" method="post" action="<?php echo base_url('estacionamento/POST_cadastro_Servico') ?>">
							<div class="form-group">
								<label>Descrição</label>
								<input type="text" class="form-control" name="descricaoServico">
							</div>
							<div class="form-group">
								<label>Preço</label>
								<input type="text" class="form-control" name="preco" >
							</div>
							<button type="submit" class="btn btn-default" >Cadastrar</button>
						</form>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-back noti-box">
							<table class="table table-striped">
								<thead>
									<tr>
										<td><strong>Descrição</strong></td>
										<td><strong>Horário Inico</strong></td>
										<td><strong>Horário Fim</strong></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($lstServicos as $item) { ?>
									<tr>
										<td><?php echo $item->descricaoServico ?></td>
										<td><?php echo $item->preco ?></td>
										<td><?php echo anchor("estacionamento/excluir_Servico/$item->IdServico",'<i class="fa fa-times"></i>&nbsp;Excluir'); ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Carregamento do MENU -->
	<?php $this->load->view('_includes/administrativo/footer') ?>
</body>
</html>