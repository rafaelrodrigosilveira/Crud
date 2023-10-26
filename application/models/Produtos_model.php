<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {

	/**
	 * Model Produtos_model
	 */
	public function getProdutos(){
		// Listar todos os dados da tabela PRODUTOS
		$query = $this->db->get('produtos');
		return $query->result();
	}

	// Adicionar um novo produto na tabela produtos
	public function addProduto($dados=NULL){

		if ($dados != NULL):
			$this->db->insert('produtos', $dados);
		endif;

	}

	//GetProdutoByID()
	public function GetProdutoByID($id=NULL){
		if($id != NULL):
			$this->db->where('id',$id);
			$this->db->limit(1);
			$query = $this->db->get("produtos");
			return $query->row();
		endif;
	}

	// Editar Produtos
	public function editarProduto($dados = NULL, $id = NULL){
		//Verifica se passado $dados e $id
		if($dados != NULL && $id != NULL):
			// Se passado ele atualiza
			$this->db->update('produtos', $dados, array('id' => $id));
		endif;
	}

	// Apagar produtos da tabela produtos
	public function apagarProduto($id = NULL){
		// Verifica se passou id como parametro
		if ($id != NULL):
			// Executa a função DB DELETE para apagar o produto
			$this->db->delete('produtos', array('id' => $id));
		endif;
	}

	// Muda status do produto na tabela produtos
	public function statusProduto($status = NULL, $id = NULL){
		//Verificamos se foi passado status e id como parametro
		if ($status != NULL && $id != NULL):
			// Executa a funçao DB update para alterar o status do produto
			$this->db->update('produtos', $status, array('id'=>$id));
		endif;
	}

	// Detalhes Produtos
	public function detalhesProduto($dados = NULL, $id = NULL){
		//Verifica se passado $dados e $id
		if($dados != NULL && $id != NULL):
			// Se passado ele atualiza
			$this->db->update('produtos', $dados, array('id' => $id));
		endif;
	}

}