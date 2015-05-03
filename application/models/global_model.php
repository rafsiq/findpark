<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_model extends CI_Model {

	public function SelectAllEstacionamentos(){

		//Montando QUERY
		$sql = "SELECT estacionamento.IdEstacionamento, NomeFantasia, CONCAT(Rua,', ',Numero,' - ',Bairro,', ',Cidade,' - ',UF) as 'endereco', ";
		$sql .= "Imagem, Latitude, Longitude, vagas.qtdVagasDisponiveis  Vagas FROM estacionamento ";
		$sql .= "INNER JOIN vagas ON vagas.IdEstacionamento = estacionamento.IdEstacionamento";

		//Executando QUERY
		$result = $this->db->query($sql);

		return $result;
	}
}