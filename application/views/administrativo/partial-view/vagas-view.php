<div class="panel back-dash green">
	<i class="fa fa-car fa-3x"></i>
	<strong> &nbsp;Vagas</strong>
	<?php //foreach ($lstUsuarios as $item) {	 ?>

	<div class="row padding-top-1">
		<div class="form-group">
			<label class="col-sm-6 control-label"><i class="fa fa-wheelchair"></i>&nbsp;Deficiêntes:</label>
			<div class="col-sm-6">
				<?php echo $lstUsuarios[0]->qtdVagasDeficientes ?> vagas
			</div>
		</div>
	</div>
	<div class="row padding-top-0">
		<div class="form-group">
			<label class="col-sm-6 control-label"><i class="fa fa-motorcycle"></i>&nbsp;Motos:</label>
			<div class="col-sm-6">
				<?php echo $lstUsuarios[0]->qtdVagasMoto ?> vagas
			</div>
		</div>
	</div>
	<div class="row padding-top-0">
		<div class="form-group">
			<label class="col-sm-6 control-label"><i class="fa fa-car"></i>&nbsp;Carros:</label>
			<div class="col-sm-6">
				<?php echo $lstUsuarios[0]->qtdVagasCarros ?> vagas
			</div>
		</div>
	</div>
	<div class="row" style="border-top: 1px solid white; margin-top:15px; padding-top:5px;">
		<div class="form-group">
			<label class="col-sm-6 control-label">Total de Vagas:</label>
			<div class="col-sm-6">
				<?php echo $lstUsuarios[0]->qtdTotalVagas ?> vagas
			</div>
		</div>
	</div>
	<?php //} ?>
</div>	