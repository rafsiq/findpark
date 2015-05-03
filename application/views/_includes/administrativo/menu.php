<nav class="navbar navbar-default navbar-fixed-top navbar-cls-top margin-bottom-0" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand login" href="<?php echo base_url('estacionamento/index') ?>">Find Park</a>
	</div>

	<a class="logout not-border-radius btn pull-right" href="<?php echo base_url('home/logout') ?>">
		<span><i class="fa fa-times"></i>&nbsp;<strong>Sair</strong></span>
	</a>
	<div class="login pull-right">
		<i class="fa fa-user"></i>&nbsp;&nbsp;<strong><?php echo $this->session->userdata('username'); ?></strong>
	</div>
</nav>
<nav class="navbar-default navbar-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="main-menu">
			<li class="text-center" >
				<img src="/findpark/content/img/find_user.png" class="user-image img-responsive" />
			</li>
			<li>
				<a class="active-menu" href="<?php echo base_url('estacionamento/index') ?>"><i class="fa fa-cogs fa-3x"></i> Painel de Controle</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-home fa-3x"></i>Estacionamento<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?php echo base_url('estacionamento/cadastro_Horario') ?>">Horário de Funcionamento</a>
					</li>
					<li>
						<a href="<?php echo base_url('estacionamento/cadastro_Servico') ?>">Serviços</a>
					</li>
					<li>
						<a href="<?php echo base_url('estacionamento/cadastro_Preco') ?>">Tabela de preços</a>
					</li>
					<li>
						<a href="<?php echo base_url('estacionamento/cadastro_Vaga') ?>">Vagas</a>
					</li>
					
				</ul>
			</li>
			<li>
				<a href="tab-panel.html"><i class="fa fa-users fa-3x"></i>Usuarios</a>
			</li>
			<li>
				<a href="chart.html"><i class="fa fa-question-circle fa-3x"></i>Ajuda</a>
			</li>
		</ul>
	</div>
</nav>