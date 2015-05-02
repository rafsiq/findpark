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
						<h2><i class="fa fa-home"></i>&nbsp;<strong><?php echo $lstUsuarios[0]->NomeFantasia; ?></strong></h2>
					</div>
				</div>
				<hr />
				<!-- Box -->
				<div class="row">
					<!-- Carregando o Box de informações da empresa -->
					<?php $this->load->view('administrativo/partial-view/box-view') ?>
				</div>
				<hr>
				<!-- Confição para exibir dados da emrpesa ****** Imagem -->
				<?php if(!isset($lstUsuarios[0]->Imagem)){ ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-back noti-box">
							<p class="main-text">
								<i class="fa fa-exclamation-circle fa-1x"></i>
								&nbsp;Cadastre uma foto do estacionamento. 
							</p>
							<span class="text-muted">Pode ser um diferencial na hora de escolha do cliente.</span>
						</div>
					</div>
				</div>
				<?php  } else { ?>
				<div class="row">
					<?php 
					/*Carregando os detalis da empresa*/
					$this->load->view('administrativo/partial-view/details-view');
					?>
				</div>
				<?php  } ?>
				<hr>
				<!-- Serviços & Vagas -->
				<div class="row">
					<!-- Serviços -->
					<?php if(!isset($lstUsuarios[0]->totalServicos)){ ?>
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
				<div class="row">
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
</body>
</html>