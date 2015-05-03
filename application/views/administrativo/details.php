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
						<h2><i class="fa fa-home"></i>&nbsp;<strong>Edição da Empresa</strong></h2>
					</div>
				</div>
				<div class="row" id="container-error">
					<strong> 
						<!-- Validação de ERROS -->
						<?php 
						$div = "<div class='alert alert-danger' role='alert'> <span class='glyphicon glyphicon-exclamation-sign' 
						aria-hidden='true'></span> <span class='sr-only'>Error:</span>";
						$_div = "</div>";

						echo validation_errors($div,$_div);

						if(isset($userInvalid))
							echo $div. $userInvalid.$_div;

						if(isset($sendEmail))
							echo $div. $userInvalid.$_div;
						?>
					</strong>
				</div>
				<hr>
				<br>
				<div class="row">
					<form method="post" enctype="multipart/form-data" name="cadastro" action="<?php echo base_url('estacionamento/atauliza_imagem') ?>" >
						<div class="col-md-3">
							<label>Escolha uma imagem.:</label>
						</div>
						<div class="col-md-7">
							<input type="file" name="Imagem" required>
						</div>
						<div class="col-md-2">
							<input type="submit" class="btn btn-f-sucess not-border-radius" value="Atualizar" />
						</div>
					</form>
				</div>
				<br>
				<hr>
				<br>
				<div class="row"> 
					<form id="frmCadastro" class="form-horizontal" role="form" method="post" action="<?php echo base_url('estacionamento/salvarEdicaoEmpresa') ?>"
						data-toggle="validator" data-delay="0" >
						<div class="form-group">
							<span class="col-md-2 control-label">Nome Fantasia <i class="text-red">*</i></span>
							<div class="col-md-9 ">
								<input  maxlength="100" type="text" name="txtNmFantasia" class="form-control" placeholder="Nome do Estacionamento"  maxlength="250"
								value="<?php echo $NomeFantasia; ?>" data-error="Informe o nome fantasia do estacionamento" required />
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<span class="col-md-2 control-label">Razão Social <i class="text-red">*</i></span>
							<div class="col-md-9 ">
								<input  maxlength="100" type="text" name="txtDsRazaoSocial" class="form-control" placeholder="Razão Social do Estacionamento" 
								maxlength="1000" 
								value="<?php echo $DsRazaoSocial; ?>" data-error="Informe a razão social do estacionamento" required />
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<span class="col-md-2 control-label">CNPJ <i class="text-red">*</i></span>
							<div class="col-md-3">
								<input  maxlength="14" type="text" required="required" id="txtCnpj" name="txtCnpj" class="form-control" placeholder="CNPJ do Estacionamento"
								value="<?php echo $cnpj; ?>" data-error="Informe um CNPJ válido" required maxlength="18" />
								<div class="help-block with-errors"></div>
								<span class="display-none text-red" id="mostraCNPJ" style="float: left;"></span>
							</div>
						</div>
						<div class="form-group">
							<span class="col-md-2 control-label">CEP <i class="text-red">*</i></span>
							<div class="col-md-3 ">
								<div class=" input-group">
									<input type="text" style="width: 260px;" id="txtCepEmpresa" name="txtCepEmpresa" class="form-control" placeholder="CEP do Estacionamento"
									value="<?php echo $cep; ?>" data-error="Informe um CNPJ válido" required maxlength="10" />
									<div class="help-block with-errors"></div>
									<span class="input-group-btn">
										<button class="btn btn-success not-border-radius" type="button" id="btnBuscaCepEmpresa">
											<i class="glyphicon glyphicon-search" title="Buscar CEP"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<span class="col-md-2 control-label">Rua <i class="text-red">*</i></span>
							<div class="col-md-9 ">
								<input  maxlength="100" type="text" name="txtRuaEmpresa" id="txtRuaEmpresa" class="form-control" placeholder="Rua do Estacionamento"
								value="<?php echo $Rua; ?>"  data-error="Informe o logradouro do estacionamento" required maxlength="100"/>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<span class="col-md-2 control-label">Numero º <i class="text-red">*</i></span>
							<div class="col-md-3 ">
								<input  maxlength="10" type="text" name="txtNumEmpresa" id="txtNumEmpresa" class="form-control" placeholder="Numero do local" 
								maxlength="6"
								value="<?php echo $Numero; ?>" data-error="Informe o numero" required maxlength="6"/>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<span class="col-md-2 control-label">Bairro <i class="text-red">*</i></span>
							<div class="col-md-9 ">
								<input  maxlength="100" type="text" name="txtBairroEmpresa" id="txtBairroEmpresa" class="form-control" placeholder="Bairro do Estacionamento"
								value="<?php echo $Bairro; ?>" data-error="Informe o bairro" required  maxlength="100"/>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<span class="col-md-2 control-label">Complemento</span>
							<div class="col-md-9 ">
								<input  maxlength="100" type="text" class="form-control" name="txtCompEmpresa" placeholder="Complemento"
								value="<?php echo $Complemento; ?>" maxlength="250"/>
							</div>
						</div>
						<div class="form-group">
							<span class="col-md-2 control-label">Cidade <i class="text-red">*</i></span>
							<div class="col-md-9 ">
								<input  maxlength="100" type="text" name="txtCidadeEmpresa" id="txtCidadeEmpresa" class="form-control" placeholder="Cidade do Estacionamento"
								value="<?php echo $Cidade; ?>" data-error="Informe a cidade pertencente ao estacionamento" required  maxlength="100"/>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<span class="col-md-2 control-label">UF <i class="text-red">*</i></span>
							<div class="col-md-3 ">
								<input  maxlength="100" type="text" name="txtUfEmpresa" id="txtUfEmpresa" class="form-control" placeholder="Cidade do Estacionamento"
								value="<?php echo $UF; ?>" data-error="Informe a estado pertencente ao estacionamento" required  maxlength="3"/>
								<div class="help-block with-errors"></div> 
							</div>
						</div>
						<div class="form-group">
							<span class="col-md-2 control-label">Telefone</span>
							<div class="col-md-2">
								<input  maxlength="16" type="text" class="form-control" style="width: 175px;" name="txtTelEmpresa" id="txtTelEmpresa" placeholder="(999) 9999-99999" 
								value="<?php echo $Telefone; ?>" maxlength="15"/>
							</div>
						</div>
						<!-- Campos ocultos do GOOGLE MAPS -->
						<input type="hidden" id="txtLatitude" name="txtLatitude" value="<?php echo $Latitude; ?>" />
						<input type="hidden" id="txtLongitude" name="txtLongitude" value="<?php echo $Longitude; ?>" />
						<input type="hidden" id="txtId" name="txtId" value="<?php echo $IdEstacionamento; ?>" />
						

						<div class="col-md-12">
							<div class="">
								<div class="col-md-11">
									<button class="btn btn-primary nextBtn btn-lg not-border-radius pull-right" type="submit">Atualizar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Carregamento do MENU -->
	<script type="text/javascript" src="<?php echo base_url('content/js/jquery-1.11.2.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/bootstrap.min.js') ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('content/js/jquery.maskedinput.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/webServices_correiros.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/webServices_google_maps.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/validator.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('content/js/custom.js') ?>"></script>
	<script type="text/javascript">

		function verificaCNPJ(_cnpj){
			if(!_cnpj)
				$('#btnNext2').prop('disabled', true);
			else
				$("#btnNext2").prop('disabled', false);
		}

		function verificaCPF(_cpf){
			if(!_cpf)
				$("#btnNext4").prop('disabled', true);
			else
				$("#btnNext4").prop('disabled', false);
		}

		$(document).ready(function () {

			verificaCNPJ(false);
			verificaCPF(false);

			$("#txtCnpj").mask("99.999.999/9999-99");
			$("#txtCPF").mask("999.999.999-99");

			$("#txtCepResp").mask("99.999-999");
			$("#txtCepEmpresa").mask("99.999-999");

			$("#txtTelEmpresa").mask("(999) 9999-9999?9");
			$("#txtTelResp").mask("(999) 9999-9999?9");

			$("#txtCnpj").blur(function (){
				var cnpj = $("#txtCnpj").val();

				if(cnpj.length >= 14){
					var result = validarCNPJ(cnpj);

					if(!result){
						verificaCNPJ(false);
						$("#mostraCNPJ").removeClass('display-none');
					}
					else{
						verificaCNPJ(true);
						$("#mostraCNPJ").addClass('display-none');
					}
				}
			});

			$("#txtCPF").blur(function (){
				var cpf = $("#txtCPF").val();

				if(cpf.length >= 11){
					var result = validarCPF(cpf);

					if(!result){
						verificaCPF(false);
						$("#mostraCPF").removeClass('display-none');
					}
					else{
						verificaCPF(true);
						$("#mostraCPF").addClass('display-none');
					}
				}
			});

			$('#btnMarcaEndereco').click(function (e){
				var rua = $("#txtRuaEmpresa").val();
				var numero = $("#txtNumEmpresa").val();
				var bairro = $("#txtBairroEmpresa").val();
				var cidade = $("#txtCidadeEmpresa").val();
				var uf = $("#txtUfEmpresa").val();
				var cep = $("#txtCepEmpresa").val().replace('.','').replace('-','');

				var endereco = rua +', ' + numero +' - '+ bairro + ', ' + cidade +' - '+ uf +', '+ cep;

				if((rua != '' || rua !== "") && (numero != '' || numero !== "") && (bairro != '' || bairro !== "") 
					&& (cidade != '' || cidade !== "") && (uf != '' || uf !== "") && (cep != '' || cep !== ""))
				{
					carregarNoMapa(endereco);
				}

			});


			$("#btnBuscaCepEmpresa").click(function (e) {
				var cep = $("#txtCepEmpresa").val().replace('.','').replace('-','');

				if(cep == '' || isNaN(cep))
					return false;

				ConsultarCep(cep, "Empresa");
			});

			$("#btnBuscaCepResp").click(function (e) {
				var cep = $("#txtCepResp").val().replace('.','').replace('-','');

				if(cep == '' || isNaN(cep))
					return false;

				ConsultarCep(cep, "Resp");
			});
		});
</script>
</body>
</html>