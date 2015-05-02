<div class="panel back-dash red">
	<i class="fa fa-wrench fa-3x"></i>
	<strong> &nbsp; Serviços</strong>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<td><strong>Tipo</strong></td>
				<td><strong>Preço</strong></td>
			</tr>
		</thead>
		<tbody>
			<?php for ($i=0; $i < $lstUsuarios[0]->totalServicos; $i++) { ?>
			<tr>
				<td><?php echo $lstUsuarios[$i]->descricaoServico ?></td>
				<td>R$ <?php echo $lstUsuarios[$i]->preco ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>	