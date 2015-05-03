<div class="col-md-4 col-sm-12 col-xs-12">
	<div class="panel">
		<img alt="Imagem do estacionamento" class="img-responsive" src="<?php echo $lstUsuarios[0]->Imagem ?>" 
		style="border: 1px solid #ccc" />
	</div>
</div>
<div class="col-md-8 col-sm-12 col-xs-12">
	<div class="panel panel-back noti-box" style="font-size:16px; line-height: 25px;">
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">Razão Social:</label>
				<div class="col-sm-9">
					<?php echo $lstUsuarios[0]->DsRazaoSocial; ?>						
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">CNPJ:</label>
				<div class="col-sm-9">
					<?php echo $lstUsuarios[0]->cnpj; ?>						
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">CEP:</label>
				<div class="col-sm-9">
					<?php echo $lstUsuarios[0]->cep; ?>						
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">Endereço:</label>
				<div class="col-sm-9">
					<?php echo $lstUsuarios[0]->Rua.' - '.$lstUsuarios[0]->Numero.', '.$lstUsuarios[0]->Bairro.' - '.$lstUsuarios[0]->Cidade.' - '.$lstUsuarios[0]->UF; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">Telefone:</label>
				<div class="col-sm-9">
					<?php echo $lstUsuarios[0]->Telefone; ?>						
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">Complemento:</label>
				<div class="col-sm-9">
					<?php echo $lstUsuarios[0]->Complemento; ?>						
				</div>
			</div>
		</div>
	</div>
</div>