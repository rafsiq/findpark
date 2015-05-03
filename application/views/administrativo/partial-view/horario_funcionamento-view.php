<div class="panel back-dash lilac">
	<i class="fa fa-clock-o fa-3x"></i>
	<strong> &nbsp; Horário de Funcionamento</strong>

	<?php for ($i=0; $i < $lstUsuarios[0]->totalHorario; $i++) { ?>

	<div class="row padding-top-1">
		<div class="form-group">
			<label class="col-sm-6 control-label"><?php echo $lstUsuarios[$i]->descricao ?></label>
			<div class="col-sm-6">
				<?php echo $lstUsuarios[$i]->horaInicio.'h'.' ás '.$lstUsuarios[$i]->horaFim.'h' ?>		
			</div>
		</div>
	</div>
	<?php } ?>
</div>	