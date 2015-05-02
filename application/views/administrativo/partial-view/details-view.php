<div class="col-md-4 col-sm-12 col-xs-12">
	<div class="panel">
		<img alt="Imagem do estacionamento" class="img-responsive" src="/findpark/content/img/estacionamentos/estac_1.png" 
		style="border: 1px solid #ccc" />
	</div>
</div>
<div class="col-md-8 col-sm-12 col-xs-12">
	<div class="panel panel-back noti-box" style="font-size:16px; line-height: 25px;">
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">Razão Social:</label>
				<div class="col-sm-9">
					<?php echo $DsRazaoSocial; ?>						
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">CNPJ:</label>
				<div class="col-sm-9">
					<?php echo $cnpj; ?>						
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">CEP:</label>
				<div class="col-sm-9">
					<?php echo $cep; ?>						
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">Endereço:</label>
				<div class="col-sm-9">
					<?php echo $Rua.' - '.$Numero.', '.$Bairro.' - '.$Cidade.' - '.$UF; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">Telefone:</label>
				<div class="col-sm-9">
					<?php echo $Telefone; ?>						
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label class="col-sm-3 control-label">Complemento:</label>
				<div class="col-sm-9">
					<?php echo $Complemento; ?>						
				</div>
			</div>
		</div>
	</div>
</div>