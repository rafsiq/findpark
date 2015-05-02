<div class="panel back-dash blue">
	<i class="fa fa-usd fa-3x"></i>
	<strong> &nbsp;Tabela de preços</strong>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<td><strong>Tempo</strong></td>
				<td><strong>Carro</strong></td>
				<td><strong>Moto</strong></td>
			</tr>
		</thead>
		<tbody>
			<?php for ($i=0; $i < $lstUsuarios[0]->totalPreco; $i++) { ?>
			<tr>
				<td><?php echo $lstPrecos[$i]->Descricao ?></td>
				<td><?php echo $lstPrecos[$i]->PrecoCarro ?></td>
				<td><?php echo $lstPrecos[$i]->PrecoMoto ?></td>
			</tr>
		</tbody>
		<?php } ?>
	</table>
</div>