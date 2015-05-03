<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Carregamento do HEADER  -->
	<?php $this->load->view('_includes/administrativo/header') ?>
	<link rel="stylesheet" href="<?php echo base_url('content/css/bootstrap-timepicker.min.css') ?>"></link>
</head>
<body>
	<div id="wrapper">
		<!-- Carregamento do HEADER  -->
		<?php $this->load->view('_includes/administrativo/menu') ?>

		<div id="page-wrapper">
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3>
							<i class="fa fa-clock-o"></i>&nbsp;<strong>Horário de Funcionamento</strong>
							<hr>
							<small>Campos obrigatórios são marcados com <i class="text-red">*</i></small>
						</h3>
					</div>
				</div>
				<div class="row" id="container-error">
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 padding-top-0">
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('estacionamento/POST_cadastro_Horario') ?>">
							<div class="form-group">
								<label class="col-md-2 control-label">Descrição&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-10">
									<input type="text" class="form-control not-border-radius" name="descricao" required />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Horário Inicio&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-2">
									<input type="text" class="form-control not-border-radius timepicker" name="horaInicio" required />
								</div>
								<label class="col-md-2 control-label">Horário Fim&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-2 ">
									<input type="text" class="form-control not-border-radius timepicker" name="horaFim" required />
								</div>
								
								<div class="col-md-4">
									<button type="submit" class="btn btn-primary not-border-radius pull-right" >Cadastrar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<hr>
				<br>
				<br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<td><strong>Descrição</strong></td>
									<td><strong>Horário Inico</strong></td>
									<td><strong>Horário Fim</strong></td>
									<td><strong></strong></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($lstHorario as $item) { ?>
								<tr>
									<td><?php echo $item->descricao ?></td>
									<td><?php echo $item->horaInicio.'h' ?></td>
									<td><?php echo $item->horaFim.'h' ?></td>
									<td><?php echo anchor("estacionamento/excluir_Horario/$item->IdHorario",'<i class="fa fa-times"></i>&nbsp;Excluir'); ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Carregamento do MENU -->
	<?php $this->load->view('_includes/administrativo/footer') ?>
	<script type="text/javascript" src="<?php echo base_url('content/js/bootstrap-timepicker.min.js') ?>"></script>
	
	<script type="text/javascript">
		$('.timepicker').timepicker({
			minuteStep: 1,
			appendWidgetTo: 'body',
			showSeconds: false,
			showMeridian: false,
			defaultTime: false
		});
	</script>
</body>
</html>