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
						<h2><i class="fa fa-home"></i>&nbsp;<span><?php echo $lstUsuarios[0]->NomeFantasia; ?></span></h2>
					</div>
				</div>
				<hr />
				<!-- Box -->
				<div class="row padding-top-0">
					<!-- Carregando o Box de informações da empresa -->
					<?php $this->load->view('administrativo/partial-view/box-view') ?>
				</div>
				<hr>
				<div class="row padding-top-0">
					<?php if( $lstUsuarios[0]->qtdTotalVagas > 0) { ?>
					<form role="form" method="post" action="<?php echo base_url('estacionamento/atauliza_vagas_disponiveis') ?>">
						<div class="row">
							<div class="col-md-1 pull-right" style="margin-right: 15px">
								<button type="submit" class="btn btn-f-sucess not-border-radius pull-right" >Ataluzar</button>
							</div>
							<div class=" col-md-1 pull-right" style="width:80px; margin-right: 15px">
								<input type="text" maxlength="2" class="form-control not-border-radius" id="txtQtdVagasDisponiveis"
								value="<?php echo $lstUsuarios[0]->qtdVagasDisponiveis ?>" name="qtdVagasDisponiveis"/>
							</div>
							<div class="col-md-2 pull-right">
								<label>Vagas disponivéis:</label>
							</div>
						</div>
					</form>
					<?php }?>
				</div>
				<hr>
				<!-- Confição para exibir dados da emrpesa ****** Imagem -->
				<?php if(!isset($lstUsuarios[0]->Imagem)){ ?>
				<div class="row padding-top-0">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-back noti-box">
							<p class="main-text">
								<i class="fa fa-exclamation-circle fa-1x"></i>
								&nbsp;Cadastre uma foto do estacionamento. 
							</p>
							<span class="text-muted">
								Pode ser um diferencial na hora de escolha do cliente.
							</span>
						</div>
					</div>
				</div>
				<?php  } else { ?>
				<div class="row padding-top-0">
					<?php 
					/*Carregando os detalis da empresa*/
					$this->load->view('administrativo/partial-view/details-view');
					?>
				</div>
				<?php  } ?>
				<hr>
				<!-- Serviços & Vagas -->
				<div class="row padding-top-0">
					<!-- Serviços -->
					<?php if(!isset($lstUsuarios[0]->totalServicos) || $lstUsuarios[0]->totalServicos == 0 ){ ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-red">
								<i class="fa fa-warning"></i>
							</span>
							<div class="text-box">
								<p class="main-text">Serviços </p>
								<p class="text-muted">Não há serviços cadastrados</p>
								<hr />
								<p class="text-muted">
									<span class="text-muted color-bottom-txt">
										<i class="fa fa-chevron-right"></i>
										Cadastre os serviços do estacionamento para ser um diferencial na hora de escolha do cliente.
										<a href="<?php echo base_url('estacionamento/cadastro_servico') ?>"> clique aqui.</a>
									</span>
								</p>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<!-- Carregando os servicos da empresa -->
						<?php $this->load->view('administrativo/partial-view/servico-view'); ?>
					</div>
					<?php } ?>
					<!-- Vagas  -->
					<?php if(!isset($lstUsuarios[0]->qtdTotalVagas)){ ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-green">
								<i class="fa fa-warning"></i>
							</span>
							<div class="text-box">
								<p class="main-text">Total de Vagas</p>
								<p class="text-muted">Não há vagas cadastradas</p>
								<hr />
								<p class="text-muted">
									<span class="text-muted color-bottom-txt">
										<i class="fa fa-chevron-right"></i>
										Cadastre a capacidade total de vagas do estacionamento para ser um diferencial na hora de escolha do cliente.
										<a href="<?php echo base_url('estacionamento/cadastro_vaga') ?>"> clique aqui.</a>
									</span>
								</p>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<!-- Carregando as vagas da empresa -->
						<?php $this->load->view('administrativo/partial-view/vagas-view');?>
					</div>
					<?php } ?>
				</div>
				<hr>
				<!-- Preço & Funcionamento -->
				<div class="row padding-top-0">
					<?php if(!isset($lstUsuarios[0]->PrecoCarro)){ ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-blue">
								<i class="fa fa-warning"></i>
							</span>
							<div class="text-box">
								<p class="main-text">Tabela de Preços</p>
								<p class="text-muted">Não há preços cadastrados</p>
								<hr />
								<p class="text-muted">
									<span class="text-muted color-bottom-txt">
										<i class="fa fa-chevron-right"></i>
										Cadastre os preços do estacionamento para ser um diferencial na hora de escolha do cliente.
										<a href="<?php echo base_url('estacionamento/cadastro_preco') ?>"> clique aqui.</a>
									</span>
								</p>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<!-- Carregando tabela de precos da empresa -->
						<?php $this->load->view('administrativo/partial-view/tabela_preco-view') ?>
					</div>
					<?php  } ?>
					<?php if(!isset($lstUsuarios[0]->horaInicio)){ ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-lilac">
								<i class="fa fa-warning"></i>
							</span>
							<div class="text-box">
								<p class="main-text">Horário de Funcionamento</p>
								<p class="text-muted">Não há horários cadastrados</p>
								<hr />
								<p class="text-muted">
									<span class="text-muted color-bottom-txt">
										<i class="fa fa-chevron-right"></i>
										Cadastre o horário de funcionamento do estacionamento para ser um diferencial na hora de escolha do cliente.
										<a href="<?php echo base_url('estacionamento/cadastro_horario') ?>"> clique aqui.</a>
									</span>
								</p>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<!-- Carregando tabela de precos da empresa -->
						<?php $this->load->view('administrativo/partial-view/horario_funcionamento-view') ?>
					</div>
					<?php  } ?>
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
			$("#txtQtdVagasDisponiveis").keypress(verificaNumero);
		});
	</script>
</body>
</html>