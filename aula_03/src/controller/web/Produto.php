<?php

namespace Daoo\Aula03\controller\web;

// use Daoo\Aula03\model\Produto as ProdutoModel;
use Exception;

class Produto extends Controller
{
	// protected ProdutoModel $model;

	public function __construct()
	{
		parent::__construct();
		// $this->model = new ProdutoModel();
	}

	public function index()
	{
		echo "<h1>Produtos</h1>";
		// $produtos = $this->model->read();
		// $this->view->load('index',$produtos);
	}

	// public function show($id)
	// {
	// 	$produto = $this->model->read($id);
	// 	if ($produto) {
	// 		$response = ['produto' => $produto];
	// 	} else {
	// 		$response = ['Erro' => "Produto não encontrado"];
	// 		header('HTTP/1.0 404 Not Found');
	// 	}
	// 	echo json_encode($response);
	// }

	// public function store()
	// {
	// 	try {
	// 		$this->validateProdutoRequest();

	// 		$this->model = new ProdutoModel(
	// 			$_POST['nome'],
	// 			$_POST['descricao'],
	// 			$_POST['quantidade'],
	// 			$_POST['preco']
	// 		);

	// 		$this->model->importado = isset($_POST['importado']);

	// 		// error_log(print_r($this->model,TRUE));
	// 		// throw new \Exception('LOG');

	// 		if ($this->model->create())
	// 			echo json_encode([
	// 				"success" => "Produto criado com sucesso!",
	// 				"data" => $this->model->getColumns()
	// 			]);
	// 		else throw new \Exception("Erro ao criar produto!");
	// 	} catch (\Exception $error) {
	// 		echo $error->getMessage();
	// 	}
	// }

	// public function update()
	// {
	// 	try {
	// 		if(!$this->validatePostRequest(['id']))
	// 			throw new Exception("Informe o ID do Produto!!");
			
	// 		$this->validateProdutoRequest();

	// 		$this->model = new ProdutoModel(
	// 			$_POST['nome'],
	// 			$_POST['descricao'],
	// 			$_POST['quantidade'],
	// 			$_POST['preco']
	// 		);
	// 		$this->model->id = $_POST["id"];
	// 		$this->model->importado = isset($_POST['importado']);

	// 		// error_log(print_r($this->model,TRUE));
	// 		// throw new \Exception('LOG');

	// 		if ($this->model->update())
	// 			echo json_encode([
	// 				"success" => "Produto atualizado com sucesso!",
	// 				"data" => $this->model->getColumns()
	// 			]);
	// 		else throw new \Exception("Erro ao atualizar produto!");
	// 	} catch (\Exception $error) {
	// 		echo $error->getMessage();
	// 	}
	// }

	// public function remove()
	// {
	// 	try {
	// 		if (!isset($_POST["id"])){
	// 			throw new \Exception('Erro: id obrigatorio!');
	// 		}
	// 		$id = $_POST["id"];
	// 		if ($this->model->delete($id)) {
	// 			$response = ["message:" => "Produto id:$id removido com sucesso!"];
	// 		} else {
	// 			throw new Exception("Erro ao remover Produto!");
	// 		}
	// 		echo $response;
	// 	} catch (\Exception $error) {
	// 		echo $error->getMessage();
	// 	}
	// }

	// private function validateProdutoRequest()
	// {
	// 	$fields = [
	// 		'nome',
	// 		'descricao',
	// 		'quantidade',
	// 		'preco'
	// 	];
	// 	if (!$this->validatePostRequest($fields))
	// 		throw new \Exception('Erro: campos imcompletos!');
	// }
}
