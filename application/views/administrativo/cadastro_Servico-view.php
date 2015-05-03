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
							<i class="fa fa-wrench"></i>&nbsp;<strong>Serviços</strong>
							<hr>
							<small>Campos obrigatórios são marcados com <i class="text-red">*</i></small>
						</h3>
					</div>
				</div>
				<div class="row" id="container-error">
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 padding-top-1">
						<form  class="form-horizontal" role="form" method="post" action="<?php echo base_url('estacionamento/POST_cadastro_Servico') ?>">
							<div class="form-group">
								<label class="col-md-2 control-label">Descrição&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-4">
									<input type="text" class="form-control not-border-radius" name="descricaoServico" required />
								</div>
								<label class="col-md-2 control-label">Preço&nbsp;<i class="text-red">*</i></label>
								<div class="form-group col-md-2">
									<input type="text" class="form-control not-border-radius" name="preco" id="txtPreco" required />
								</div>
								<div class="col-md-2">
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
								</tr>
							</thead>
							<tbody>
								<?php foreach ($lstServicos as $item) { ?>
								<tr>
									<td><?php echo $item->descricaoServico ?></td>
									<td><?php echo 'R$ '.$item->preco ?></td>
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

	<!-- Carregamento do FOOTER -->
	<?php $this->load->view('_includes/administrativo/footer') ?>
	<script type="text/javascript" src="<?php echo base_url('content/js/jquery.maskMoney.min.js') ?>"></script>
	
	<script type="text/javascript">
		$("#txtPreco").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
	</script>
</body>
</html>