<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class estacionamento extends CI_Controller
{

	protected $userValidate;
	protected $userCondition;
	protected $idEstacionamento;

	//Propriedades da classe
	public function getIdEstacionamento(){
		return $this->idEstacionamento;
	}

	public function setIdEstacionamento($_id){
		$this->idEstacionamento = $_id;
	}

	public function getUserValidate(){
		return $this->userValidate;
	}

	public function setUserValidate($_validate){
		$this->userValidate = $_validate;
	}

	public function getUserCondition(){
		return $this->userCondition;
	}

	public function setUserCondition($_condition){
		$this->userCondition = $_condition;
	}

	public function __construct()
	{
		//Invoke o construtor pai
		parent::__construct();

		//Carregando os Helpers do CI
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('array');

		//Carregando os MODELS do CI
		$this->load->model('estacionamento_model');
		$this->load->model('usuario_model');
		$this->load->model('membership_model');
		$this->load->model('email_model');

		//Verifica USUARIO LOGADO
		$this->membership_model->user_logged();

		$this->setUserCondition( array(
			'login' => $this->session->userdata('username'),
			'email' => $this->session->userdata('username')));

		//Validação de USUARIO - FLGVALIDO
		$this->setUserValidate($this->membership_model->user_email_valid($this->getUserCondition()));

		//ADICIONANDO Permissões de URL'S
		$url = base_url('/estacionamento/valida_email');
		$urlAutenticacao = base_url('/estacionamento/validacao_email');
		$urlReenviar = base_url('/estacionamento/reenviar_email');
		$urlAtual = current_url();

		//Se Não tiver Valido e URL for diferente
		if($urlAtual != $url && $urlAtual != $urlAutenticacao && $urlAtual != $urlReenviar && !$this->getUserValidate()){
			$a = array('b' => 'teste');
			redirect('/estacionamento/valida_email', $a);
		}
	}

	public function index()
	{
		$query = $this->estacionamento_model->SelectByID($this->getUserCondition())->result();

		$row = $query[0];

		$this->setIdEstacionamento($row->IdEstacionamento);
        //Buscando do BD
		$subQuery = $this->SelectSum($row->IdEstacionamento)->row();
		$queryServicos = $this->SelecionarServicos($row->IdEstacionamento)->result();
		$queryPrecos = $this->SelecionarPrecos($row->IdEstacionamento)->result();

        //Atribundo os valores
		$query[0]->totalUsuario = $subQuery->totalUsuario;
		$query[0]->totalServicos = $subQuery->totalServicos;
		$query[0]->totalHorario = $subQuery->totalHorario;
		$query[0]->totalPreco = $subQuery->totalPreco;

		//print_r($query);
		$data = array('lstUsuarios' => $query, 'lstServicos' => $queryServicos, 'lstPrecos' => $queryPrecos);

		$this->load->view('administrativo/dashboard-view',$data);
	}

	public function cadastro_Horario(){

		$queryEmpresa = $this->estacionamento_model->SelectByIdEmpresa($this->getUserCondition())->row();
		$queryHorario = $this->estacionamento_model->SelectHorario($queryEmpresa->IdEstacionamento)->result();

		$data = array('lstHorario' => $queryHorario);

		//print_r($data);
		$this->load->view('administrativo/cadastro_Horario-view', $data);
	}

	public function cadastro_Servico(){

		$queryEmpresa = $this->estacionamento_model->SelectByIdEmpresa($this->getUserCondition())->row();
		$queryServico = $this->estacionamento_model->SelectServicos($queryEmpresa->IdEstacionamento)->result();

		$data = array('lstServicos' => $queryServico);

		//print_r($data);
		$this->load->view('administrativo/cadastro_Servico-view', $data);
	}

	public function cadastro_Preco(){

		$queryEmpresa = $this->estacionamento_model->SelectByIdEmpresa($this->getUserCondition())->row();
		$queryPreco = $this->estacionamento_model->SelectPrecos($queryEmpresa->IdEstacionamento)->result();

		$data = array('lstPreco' => $queryPreco);

		//print_r($data);
		$this->load->view('administrativo/cadastro_Preco-view', $data);
	}

	public function cadastro_Vaga(){

		$queryEmpresa = $this->estacionamento_model->SelectByIdEmpresa($this->getUserCondition())->row();
		$queryVaga = $this->estacionamento_model->SelectVagas($queryEmpresa->IdEstacionamento)->result();

		$data = array('lstVaga' => $queryVaga);

		//print_r($data);
		$this->load->view('administrativo/cadastro_Vaga-view', $data);
	}

	public function POST_cadastro_Horario(){
		$query = $this->estacionamento_model->SelectByIdEmpresa($this->getUserCondition())->row();

		$data = elements(array('descricao','horaInicio','horaFim'),$this->input->post());

		$data['IdEstacionamento'] = $query->IdEstacionamento;

		$this->estacionamento_model->InsertHorarioFuncionamento($data);
		//$this->load->view('administrativo/cadastro_Horario-view', $query);

		redirect('estacionamento/cadastro_Horario');
	}

	public function POST_cadastro_Servico(){
		$query = $this->estacionamento_model->SelectByIdEmpresa($this->getUserCondition())->row();

		$data = elements(array('descricaoServico','preco'),$this->input->post());

		$data['IdEstacionamento'] = $query->IdEstacionamento;

		$this->estacionamento_model->InsertServico($data);
		//$this->load->view('administrativo/cadastro_Horario-view', $query);

		redirect('estacionamento/cadastro_Servico');
	}

	public function POST_cadastro_Preco(){
		$query = $this->estacionamento_model->SelectByIdEmpresa($this->getUserCondition())->row();

		$data = elements(array('descricao','PrecoCarro','PrecoMoto'),$this->input->post());

		$data['IdEstacionamento'] = $query->IdEstacionamento;

		$this->estacionamento_model->InsertPreco($data);
		//$this->load->view('administrativo/cadastro_Horario-view', $query);

		redirect('estacionamento/cadastro_Preco');
	}

	public function excluir_Horario(){

		$IdHorario= $this->uri->segment(3);

		if($IdHorario == null)
			return false;

		$this->estacionamento_model->DeleteHorario($IdHorario);

		redirect('estacionamento/cadastro_Horario');
	}

	public function excluir_Servico(){

		$IdServico= $this->uri->segment(3);

		if($IdServico == null)
			return false;

		$this->estacionamento_model->DeleteServico($IdServico);

		redirect('estacionamento/cadastro_Servico');
	}

	public function excluir_Preco(){

		$IdPreco= $this->uri->segment(3);

		if($IdPreco == null)
			return false;

		$this->estacionamento_model->DeletePreco($IdPreco);

		redirect('estacionamento/cadastro_Preco');
	}

	public function details(){
		$query = $this->estacionamento_model->SelectByIdEmpresa($this->getUserCondition())->row();

		$this->load->view('administrativo/details', $query);
	}

	public function salvarEdicaoEmpresa(){

		//Preenchendo um ARRAY 
		$dataEstacionamento = elements(array('txtNmFantasia', 'txtDsRazaoSocial', 'txtCnpj', 'txtCepEmpresa', 'txtRuaEmpresa', 'txtNumEmpresa', 
			'txtBairroEmpresa', 'txtCidadeEmpresa','txtUfEmpresa', 'txtCompEmpresa', 'txtTelEmpresa', 'txtLatitude', 'txtLongitude'),$this->input->post());

		//OPEN TRANSACTION
		$this->db->trans_begin();

		//Monta as condições para atualizar
		$condition = array('IdEstacionamento' => $this->input->post('txtId'));

		$this->estacionamento_model->Update($dataEstacionamento, $condition);

		if ($this->db->trans_status() === FALSE){
			//FAIL TRANSATION
			$this->db->trans_rollback();

			//Retornando o erro
			$error['erro'] = "Não foi possivel concluir a operação.";
			return $this->load->view('administrativo/details',$error);
		}
		else{
			//SUCESS TRANSACTION
			$this->db->trans_commit();
			echo "sucesso";
		}
	}

	public function SelectSum($idEstacionamento){
		return  $this->estacionamento_model->SelectSubQueryEstacionamento($idEstacionamento);
	}

	public function SelecionarServicos($idEstacionamento){
		return  $this->estacionamento_model->SelectServicos($idEstacionamento);
	}

	public function SelecionarPrecos($idEstacionamento){
		return  $this->estacionamento_model->SelectPrecos($idEstacionamento);
	}

	public function valida_email(){

		if($this->getUserValidate())
			redirect('/estacionamento/index');

		//Recupera o e-mail do usuario
		$data = array('emailUser' => $this->membership_model->get_email_user($this->getUserCondition()));

		$this->load->view('administrativo/valida_email-view', $data);
	}

	public function reenviar_email(){

		//Recuperando dados USUARIO
		$emailUser = $this->membership_model->get_email_user($this->getUserCondition());
		$codigoEmailUser =  $this->usuario_model->SelectCodigoEmail($this->getUserCondition());

		//Carregando o TEMPLATE para enviar e-mail
		$dataEmail = array('codigo' => $codigoEmailUser);
		$template = $this->load->view('template_email-view',$dataEmail,TRUE);

		//REENVIAR E-MAIL
		$this->email_model->EnviarEmail('Validação de Acesso ao Sistema', 'lv.lucasvin@gmail.com', $emailUser, $template);

		$data = array('sendEmail' => 'E-mail enviado com sucesso');

		redirect('/estacionamento/index');
		//return $this->load->view('login/valida_email-view', $data);
	}

	public function validacao_email(){

		$this->form_validation->set_rules('txtCodigoEmail', 'CODIGO', 'required');

		//Recupera EMAIL usuario
		$data['emailUser']= $this->membership_model->get_email_user($this->getUserCondition());

		//SE o FRM não estiver VALIDO
		if (!$this->form_validation->run())
			return $this->load->view('administrativo/valida_email-view', $data);

		//Monta as condições para atualizar
		$condition = array(
			'Login' => $this->session->userdata('username'), 
			'Email' => $this->membership_model->get_email_user($this->getUserCondition()),
			'txtCodigoEmail' => $this->input->post());

		//carregar model 
		$query = $this->estacionamento_model->UpdateCodigoEmail($condition);

		if(!$query){
			//Retornando o erro
			$data['userInvalid'] = "O código não é válido";

			return $this->load->view('administrativo/valida_email-view',$data);
		}

		redirect('/estacionamento/index');
	}
}