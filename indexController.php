<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
  
include 'App//model//produtos.php';
/**
 * Description of indexController
 *
 * @author alfamidia
 */
class indexController {
    
    protected $view;
    public $produtos;
    public $detalhe_produto;
    public $mensagem;
    
    //put your code here
    public function index() {
        echo $_GET['idProduto'];
        $this->render('index.php','template.php');
    }
    
    public function incluir() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelProdutos = new \App\model\produtos();
            $idGerado = $modelProdutos->IncluirProduto($_POST['nome'],$_POST['descricao']);
            $this->detalhe_produto = $modelProdutos->LerDetalheProduto($idGerado);
            $this->mensagem = "Produto incluido";
            $this->render('editado.php','template.php');
            return;
        }
        
        $this->render('incluir.php','template.php');       
    }
    
    public function lista() {
        $modelProdutos = new \App\model\produtos();
        $this->produtos = $modelProdutos->RetornaProdutos();
        $this->render('lista.php','template.php');
    }
    
    
    public function conteudo() {
        $modelProdutos = new \App\model\produtos();
        $this->detalhe_produto = $modelProdutos->LerDetalheProduto($_GET['idProduto']);
        $this->render('conteudo.php','template.php');
    }
    
     public function remover() {
        $modelProdutos = new \App\model\produtos();
        $modelProdutos->RemoverProduto($_GET['idProduto']);
        $this->render('remover.php','template.php');
    }
    
    public function editar() {
        $modelProdutos = new \App\model\produtos();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelProdutos->AtualizarProduto($_GET['idProduto'],$_POST['nome'],$_POST['descricao']);
            $this->detalhe_produto = $modelProdutos->LerDetalheProduto($_GET['idProduto']);
            $this->mensagem = "Produto Atualizado";
            $this->render('editado.php','template.php');
            return;
        }
        $this->detalhe_produto = $modelProdutos->LerDetalheProduto($_GET['idProduto']);
        $this->render('editar.php','template.php');       
    }
    
 
    public function content() {
        include $this->view;
    }
    
    public function render($view, $template) {
        $this->view = 'App//view//www//' . $view;
        include 'App//view//' . $template;
    }
    
}
?>
<a href='/lista'>Voltar para lista</a> 