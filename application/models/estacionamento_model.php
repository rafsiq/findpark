<?php
defined('BASEPATH') OR exit('No direct script access allowed');
get_instance()->load->getInterface('IRepository');

class Estacionamento_model extends CI_Model implements IRepository {

	function __construct()
	{
		parent::__construct();
	}
	
    public function Select(){}
	
	public function SelectByID($data = NULL){

    	if($data == NULL)
    		throw new Exception("Paramentro nulo ou vazio");

    	$this->load->model('usuario_model');
    	$resultID = $this->usuario_model->SelectById($data);

    	if($resultID <= 0)
    		return FALSE;

    	$query = $this->db->select('usuario_estacionamento.*, estacionamento.*,  
    			  servicos.IdServico, servicos.descricaoServico ,servicos.preco, 
    			  vagas.qtdVagasDeficientes, vagas.qtdVagasCarros, vagas.qtdVagasMoto, vagas.qtdTotalVagas, vagas.qtdVagasDisponiveis,
    			  preco.Descricao, preco.PrecoCarro, preco.PrecoMoto,
    			  horario.descricao, horario.horaInicio, horario.horaFim')
				 ->from('estacionamento')
				 ->join('usuario_estacionamento', 'estacionamento.IdEstacionamento = usuario_estacionamento.IdEstacionamento')
				 ->join('servicos', 'estacionamento.IdEstacionamento = servicos.IdEstacionamento','left')
				 ->join('vagas', 'estacionamento.IdEstacionamento = vagas.IdEstacionamento','left')
				 ->join('preco', 'estacionamento.IdEstacionamento = preco.IdEstacionamento','left')
				 ->join('horario', 'estacionamento.IdEstacionamento = horario.IdEstacionamento','left')
				 ->where('usuario_estacionamento.IdUsuario', $resultID)
				 ->get();

		return $query;
    }

    public function SelectByIdEmpresa($data = NULL){
    	if($data == NULL)
    		throw new Exception("Paramentro nulo ou vazio");

    	$this->load->model('usuario_model');
    	$resultID = $this->usuario_model->SelectById($data);

    	if($resultID <= 0)
    		return FALSE;

    	$query = "SELECT * FROM estacionamento ";
		$query .= "WHERE idestacionamento = ? ";

		$result = $this->db->query($query, $resultID);

		return $result; 
    }
	
    public function SelectSubQueryEstacionamento($data = NULL){

    	if($data == NULL)
    		throw new Exception("Paramentro nulo ou vazio");

		$query = "SELECT ";
		$query .= "(SELECT COUNT(usuario_estacionamento.idusuario)  from usuario_estacionamento ";
		$query .= "WHERE usuario.idusuario = usuario_estacionamento.idusuario) as totalUsuario, ";
		$query .= "(SELECT COUNT(servicos.idestacionamento) FROM servicos ";
		$query .= "WHERE servicos.idestacionamento = estacionamento.idestacionamento) as totalServicos, ";
		$query .= "(SELECT COUNT(horario.idestacionamento) FROM horario ";
		$query .= "WHERE horario.idestacionamento = estacionamento.idestacionamento) as totalHorario, ";
		$query .= "(SELECT COUNT(preco.idestacionamento) FROM preco ";
		$query .= "WHERE preco.idestacionamento = estacionamento.idestacionamento) as totalPreco, ";
		$query .= "qtdTotalVagas, qtdVagasDisponiveis ";
		$query .= "FROM usuario, estacionamento ";
		$query .= "LEFT JOIN vagas ON vagas.idestacionamento = estacionamento.idestacionamento ";
		$query .= "WHERE estacionamento.idestacionamento = ? ";
		$result = $this->db->query($query, $data);

		//Verificando se há registro
		if($result->num_rows() == 1){
			$aux = $result->row()->totalUsuario;

			if($aux != 0){
				return $result;
			}
			else{
				return FALSE;
			}
		}
		else
			return FALSE; 
    }

    public function SelectServicos($data = NULL){

    	if($data == NULL)
    		throw new Exception("Paramentro nulo ou vazio");

		$query = "SELECT * FROM servicos ";
		$query .= "WHERE idestacionamento = ? ";

		$result = $this->db->query($query, $data);

		return $result; 
    }

	public function SelectPrecos($data = NULL){

    	if($data == NULL)
    		throw new Exception("Paramentro nulo ou vazio");

		$query = "SELECT * FROM preco ";
		$query .= "WHERE idestacionamento = ? ";

		$result = $this->db->query($query, $data);

		return $result; 
    }

    public function SelectHorario($data = NULL){

    	if($data == NULL)
    		throw new Exception("Paramentro nulo ou vazio");

		$query = "SELECT * FROM horario ";
		$query .= "WHERE idestacionamento = ? ";

		$result = $this->db->query($query, $data);

		return $result; 
    }

    public function SelectVagas($data = NULL){

    	if($data == NULL)
    		throw new Exception("Paramentro nulo ou vazio");

		$query = "SELECT * FROM vagas ";
		$query .= "WHERE idestacionamento = ? ";

		$result = $this->db->query($query, $data);

		return $result; 
    }

    public function Update($data = null, $condition = null){
	
		if($condition == null)
			throw new Exception("Paramentro nulo ou vazio");

		//Montando QUERY
		$sql = "UPDATE estacionamento SET NomeFantasia = '".$data['txtNmFantasia']."', DsRazaoSocial = '".$data['txtDsRazaoSocial']."', ";
		$sql .="cnpj = '".$data['txtCnpj']."', cep = '".$data['txtCepEmpresa']."', Rua = '".$data['txtRuaEmpresa']."', ";
		$sql .="Numero ='".$data['txtNumEmpresa']."', Bairro = '".$data['txtBairroEmpresa']."', Cidade = '".$data['txtCidadeEmpresa']."', ";
		$sql .= "UF = '".$data['txtUfEmpresa']."', Complemento = '".$data['txtCompEmpresa']."', ";
		$sql .= "Telefone = '".$data['txtTelEmpresa']."', Latitude = '".$data['txtLatitude']."', ";
		$sql .= "Longitude = '".$data['txtLongitude']."' ";
		$sql .="WHERE IdEstacionamento = ?";
		//PARAMETERS
		//Executando QUERY
		$this->db->query($sql,$condition);
	}
    
	public function UpdateCodigoEmail($condition = null){

		if($condition == null)
			throw new Exception("Paramentro nulo ou vazio");

		//Montando QUERY
		$query = "SELECT * FROM usuario WHERE (login = ? OR email = ?) AND CodigoEmail = ?";
		$resultSelect = $this->db->query($query, $condition);

		//Verificando se há registro
		if($resultSelect->num_rows() == 1){
			
			$sql = "UPDATE usuario SET FlgValido = TRUE  WHERE (Login = ? OR Email = ?) AND CodigoEmail = ?";
       	 	$this->db->query($sql, $condition);

        	return TRUE;
		}
		else
			return FALSE;  
    }	
	
	public function Delete($condition = null){
	
		if($condition == null)
			throw new Exception("Paramentro nulo ou vazio");	
	}

	public function DeleteHorario($condition = null){
	
		if($condition == null)
			throw new Exception("Paramentro nulo ou vazio");

		$this->db->where('IdHorario', $condition)->delete('horario');
			//redirect('usuario/details');
	}
	
	public function DeleteServico($condition = null){
	
		if($condition == null)
			throw new Exception("Paramentro nulo ou vazio");

		$this->db->where('IdServico', $condition)->delete('servicos');
		//redirect('usuario/details');
	}

	public function DeletePreco($condition = null){
	
		if($condition == null)
			throw new Exception("Paramentro nulo ou vazio");

		$this->db->where('IdPreco', $condition)->delete('preco');
			//redirect('usuario/details');
	}
	
	public function Insert($data = NULL){
		if($data == null)
			throw new Exception("Paramentro nulo ou vazio");

		//Montando QUERY
		$sql = "INSERT INTO estacionamento (NomeFantasia, DsRazaoSocial, cnpj, cep, Rua, Numero, Bairro, Cidade, ";
		$sql .= "UF, Complemento, Telefone, FlgAtivo, Latitude, Longitude) ";
		
		//PARAMETERS
		$sql .= "VALUES('".$data['txtNmFantasia']."', '".$data['txtDsRazaoSocial']."', '".$data['txtCnpj']."', '".$data['txtCepEmpresa']."', ";
		$sql .=	"'".$data['txtRuaEmpresa']."', '".$data['txtNumEmpresa']."', '".$data['txtBairroEmpresa']."', '".$data['txtCidadeEmpresa']."', ";
		$sql .=	"'".$data['txtUfEmpresa']."', '".$data['txtCompEmpresa']."', '".$data['txtTelEmpresa']."', ";
		$sql .= "'".FALSE."','".$data['txtLatitude']."', '".$data['txtLongitude']."' ";
		$sql .= ")";
		
		//Executando QUERY
		$this->db->query($sql);
	}    

	public function InsertHorarioFuncionamento($data = NULL){
		if($data == null)
			throw new Exception("Paramentro nulo ou vazio");

		$this->db->insert('horario',$data);
		//redirect("usuario/index");
	}  

	public function InsertServico($data = NULL){
		if($data == null)
			throw new Exception("Paramentro nulo ou vazio");

		$this->db->insert('servicos',$data);
		//redirect("usuario/index");
	}

	public function InsertPreco($data = NULL){
		if($data == null)
			throw new Exception("Paramentro nulo ou vazio");

		$this->db->insert('preco',$data);
		//redirect("usuario/index");
	}    
	
}