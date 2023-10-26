<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	/**
	 * Controller Produtos
	 */
	public function index()
	{
		// DADOS DA PAGINA
		$data['titulo'] = "Listar Produtos";

		// CARREGAMENTO DO MODEL
		$this->load->model('produtos_model','produtos');
		$data['produtos'] = $this->produtos->getProdutos();//Pega dados do Model

		// CARREGAMENTO DAS VIEWS
		$this->load->view('listarprodutos', $data);// carrega view
	}

	// FUNÇAO ADICIONAR PRODUTOS
	public function add(){
		// Carrega o Model Produtos
		$this->load->model('produtos_model','produtos');// carrega model produtos
		// Carrega a View
		$this->load->view('addprodutos');
	}

	// FUNÇAO SALVAR PRODUTOS
	public function salvar(){

		// Verifica se foi passado o campo nome vazio
		if ($this->input->post('nome') == NULL){
			$this->load->view('erroAddProdutos');
		}else{

			//Carrega o Model Produtos
			$this->load->model('produtos_model','produtos');

			//Pega dados do POST e carrega no Array $dados
			$dados['nome'] = $this->input->post('nome');
			$dados['preco'] = $this->input->post('preco');
			$dados['ativo'] = $this->input->post('ativo');

			// executa a função do produtos_model adicionar (descontinuada na versão 1.32)
			// $this->produtos->addProduto($dados);

			//Verifica se foi passado parametro id via post (a partir da versão 1.32)
			if($this->input->post('id') != NULL) {
				// Se passado o parametro ele atualiza o produto
				$this->produtos->editarProduto($dados, $this->input->post('id'));
			}else{
				// Se não foi passado o parametro, adiciona novo produto
				$this->produtos->addProduto($dados);
			}

			//Fazemos o redirecionamento para a pagina
			redirect("/");
		}
	}

	// FUNÇAO EDITAR PRODUTOS
	public function editar($id=NULL){

		// Verifica se foi passado um ID. Se não, vai para a página LISTAR PRODUTOS
		if ($id == NULL){
			redirect('/');
		}

		//Carrega o Model Produtos
		$this->load->model('produtos_model','produtos');

		// Faz consulta no BD e verifica se existe
		$query = $this->produtos->GetProdutoByID($id);

		// Verifica que a consulta volta um registro. Se não, vai para a página LISTAR PRODUTOS
		if ($query == NULL){
			redirect('/');
		}

		// Array para guardar os dados dos produtos e passa como parametro para a view
		$dados['produto'] = $query;

		// Carrega a View
		$this->load->view('editarProdutos', $dados);

	}

	// FUNÇAO APAGAR REGISTRO
	public function apagar($id = NULL){
		// Verifica se passou Id como parametro
		if($id == NULL){
			redirect('/');
		}

		//Carrega o Model Produtos
		$this->load->model('produtos_model','produtos');

		// Faz a consulta no DB
		$query = $this->produtos->GetProdutoByID($id);

		// Verifica se encontrou registro com a id passado
		if ($query != NULL){
			// Executa a função apagarProdutos() do produtos_model
			$this->produtos->apagarProduto($query->id);
			redirect('/');
		}else {
			// Se não encontrou o registro com a id no DB ele volta para a pagina anterior
			redirect('/');
		}
	}

	// FUNÇAO EDITAR PRODUTOS
	public function status($id=NULL){

		// Verifica se foi passado um ID. Se não, vai para a página LISTAR PRODUTOS
		if ($id == NULL){
			redirect('/');
		}

		//Carrega o Model Produtos
		$this->load->model('produtos_model','produtos');

		// Faz consulta no BD e verifica se existe
		$query = $this->produtos->GetProdutoByID($id);

		// Verifica que a consulta volta um registro. Se não, vai para a página LISTAR PRODUTOS
		if ($query != NULL){
			// Verifica se o produto está ativo ou inativo para mudar seu status
			if($query->ativo == 1){
				$dados['ativo'] = 0;
			}else{
				$dados['ativo'] = 1;
			}
			// executa a função do produtos_model statusProduto
			$this->produtos->statusProduto($dados, $query->id);
			redirect('/');
		}else{
			// Se não encontrar registro id retorna
			redirect('/');
		}
	}

	// FUNÇAO DETALHES PRODUTOS
	public function detalhes($id=NULL){

		// Verifica se foi passado um ID. Se não, vai para a página LISTAR PRODUTOS
		if ($id == NULL){
			redirect('/');
		}

		//Carrega o Model Produtos
		$this->load->model('produtos_model','produtos');

		// Faz consulta no BD e verifica se existe
		$query = $this->produtos->GetProdutoByID($id);

		// Verifica que a consulta volta um registro. Se não, vai para a página LISTAR PRODUTOS
		if ($query == NULL){
			redirect('/');
		}

		// Array para guardar os dados dos produtos e passa como parametro para a view
		$dados['produto'] = $query;

		// Carrega a View
		$this->load->view('detalhesproduto', $dados);
	}


}
