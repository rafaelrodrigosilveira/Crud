<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	/**
	 * Controller Padrão
	 */
	public function index()
	{
		// DADOS DA PAGINA
		$dados['titulo'] = "Página Inicial";

		// CARREGAMENTO DAS VIEWS
		$this->load->view('template/head');
		$this->load->view('template/home', $dados);
		$this->load->view('template/scripts');
		//$this->load->view('listarProdutos');
	}
}
