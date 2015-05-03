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
						<h3>
							<i class="fa fa-car"></i>&nbsp;<strong>Vagas</strong>
							<hr>
							<small>Campos obrigatórios são marcados com <i class="text-red">*</i></small>
						</h3>
					</div>
				</div>
				<div class="row" id="container-error">
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 padding-top-0">
						<h4>Informe a quantidade de vagas abaixo.:
							<hr>
						</h4>
						<?php if(sizeof($lstVaga) == 0) { ?>
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('estacionamento/POST_cadastro_Vaga') ?>">
							<div class="form-group padding-top-0">
								<label class="col-md-2 control-label"><i class="fa fa-wheelchair"></i>&nbsp;Deficiêntes&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-1" style="width:140px;">
									<input type="number" class="form-control not-border-radius" name="qtdVagasDeficientes" id="txtQtdVagasMoto" required />
								</div>
								<label class="col-md-2 control-label"><i class="fa fa-car"></i>&nbsp;Carros&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-1" style="width:140px;">
									<input type="number" class="form-control not-border-radius" name="qtdVagasCarros" id="txtQtdVagasCarros" required />
								</div>
								<label class="col-md-2 control-label"><i class="fa fa-motorcycle"></i>&nbsp;Motocicleta&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-1" style="width:140px;">
									<input type="number" class="form-control not-border-radius" name="qtdVagasMoto" id="txtQtdVagasMoto" required />
								</div>
								<div class="col-md-2">
									<button type="submit" class="btn btn-primary not-border-radius pull-right" >Cadastrar</button>
								</div>
							</div>
						</form>
						<?php } else { ?>
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('estacionamento/POST_atualizar_Vaga') ?>">
							<div class="form-group padding-top-0">
								<label class="col-md-2 control-label"><i class="fa fa-wheelchair"></i>&nbsp;Deficiêntes&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-1" style="width:140px;">
									<input type="number" class="form-control not-border-radius" name="qtdVagasDeficientes" id="txtQtdVagasMoto" required 
									value ="<?php echo $lstVaga[0]->qtdVagasDeficientes?>"/>
								</div>
								<label class="col-md-2 control-label"><i class="fa fa-car"></i>&nbsp;Carros&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-1" style="width:140px;">
									<input type="number" class="form-control not-border-radius" name="qtdVagasCarros" id="txtQtdVagasCarros" required 
									value ="<?php echo $lstVaga[0]->qtdVagasCarros?>"/>
								</div>
								<label class="col-md-2 control-label"><i class="fa fa-motorcycle"></i>&nbsp;Motocicleta&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-1" style="width:140px;">
									<input type="number" class="form-control not-border-radius" name="qtdVagasMoto" id="txtQtdVagasMoto" required 
									value ="<?php echo $lstVaga[0]->qtdVagasMoto?>"/>
								</div>
								<div class="col-md-2">
									<button type="submit" class="btn btn-primary not-border-radius pull-right" >Atualizar</button>
								</div>
							</div>
						</form>
						<?php } ?>
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
									<td><strong><i class="fa fa-wheelchair"></i>&nbsp;Vagas para deficiêntes</strong></td>
									<td><strong><i class="fa fa-car"></i>&nbsp;Carro</strong></td>
									<td><strong><i class="fa fa-motorcycle"></i>&nbsp;Motocicleta</strong></td>
									<td><strong>Capacidade Total</strong></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($lstVaga as $item) { ?>
								<tr>
									<td><?php echo $item->qtdVagasDeficientes ?></td>
									<td><?php echo $item->qtdVagasCarros ?></td>
									<td><?php echo $item->qtdVagasMoto ?></td>
									<td><?php echo $item->qtdTotalVagas ?></td>
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
	<script type="text/javascript" src="<?php echo base_url('content/js/jquery-1.11.2.min.js') ?>"></script>
	<script type="text/javascript">
		function verificaNumero(e) {
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				return false;
			}
		}
		$(document).ready(function() {
			$("#txtQtdVagasMoto, #txtQtdVagasCarros, #txtQtdVagasMoto ").keypress(verificaNumero);
		});
	</script>
</body>
</html>