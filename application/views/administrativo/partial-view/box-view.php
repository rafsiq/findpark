<div class="col-lg-3 col-md-3 col-sm-6">
	<div class="panel panel-primary text-center no-boder bg-color-blue">
		<div class="panel-body">
			<i class="fa fa-users fa-3x"></i>
			<h3><?php echo (!isset($lstUsuarios[0]->totalUsuario)) ? '0' : $lstUsuarios[0]->totalUsuario ?> - Usuário</h3>
		</div>
		<div class="panel-footer back-footer-blue">
			<strong>Usuarios cadastrados</strong>
		</div>
	</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6">
	<div class="panel panel-primary text-center no-boder bg-color-red">
		<div class="panel-body">
			<i class="fa fa-wrench fa-3x"></i>
			<h3><?php echo (!isset($lstUsuarios[0]->totalServicos)) ? '0' : $lstUsuarios[0]->totalServicos ?> - Serviço</h3>
		</div>
		<div class="panel-footer back-footer-red">
			<strong>Total de serviços</strong>
		</div>
	</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6">
	<div class="panel panel-primary text-center no-boder bg-color-lilac">
		<div class="panel-body">
			<i class="fa fa-tags fa-3x"></i>
			<h3><?php echo (!isset($lstUsuarios[0]->qtdTotalVagas)) ? '0' : $lstUsuarios[0]->qtdTotalVagas ?> - Vagas</h3>
		</div>
		<div class="panel-footer back-footer-lilac">
			<strong>Total de vagas</strong>
		</div>
	</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6">
	<div class="panel panel-primary text-center no-boder bg-color-green">
		<div class="panel-body">
			<i class="fa fa-car fa-3x"></i>
			<h3><?php echo (!isset($lstUsuarios[0]->qtdVagasDisponiveis)) ? '0' : $lstUsuarios[0]->qtdVagasDisponiveis ?> - Vagas</h3>
		</div>
		<div class="panel-footer back-footer-green">
			<strong>Vagas disponivéis</strong>
		</div>
	</div>
</div>