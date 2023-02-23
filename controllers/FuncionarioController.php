<?php
require_once("../models/Funcionario.php");
require_once("../models/Empresa.php");


class FuncionarioController
{
    protected $funcionario;
    protected $loja;
    protected $lojas;

    function __construct()
    {
        $this->funcionario = new Funcionario();
        $this->loja = new Empresa();
    }

    static protected $cargos  = [1 => "Administrador", 2 => "Gerente", 3 => "Vendedor", 5 => "Motoboy", 7 => "Diretor Geral", 8 => "Auxiliar Administrativo", 10 => "Farmacêutica", "E" => "Entregador", 4 => "Comprador", 11 => "Gerente Folga"];

    function listarFuncionario()
    {

        $dados = $this->funcionario->getFuncionarios();
        $lojas =  $this->loja->getLojas();

        foreach ($dados as $colaborador) {

            $codigo = $colaborador['codigo'];
            $nome =  $colaborador['nome'];


            foreach ($lojas as $empresa) {
                if ($empresa['codigo'] == $colaborador['loja']) $this->loja = $empresa['nome_res'];
            }

            $cargo =  FuncionarioController::$cargos[$colaborador['perfil']];


            echo '
            <tr>
            <td>' . $nome . '</td>
            <td>' . $cargo . '</td>
            <td>' . $this->loja . '</td>
            <td>
            <form action="crudUsuario.php" method="post">
                <button class="btn" data-bs-placement="top" title="Editar Funcionário" ><i class="fa-solid fa-user-gear" style="color:royalblue"></i></button>
                <input type="hidden" name="codigo" value=' . $codigo . '>
            </form>
            </td>
            </tr>
            ';
        }
    }

    function dadosFuncionario($codigo)
    {
        $dados = $this->funcionario->getFuncionario($codigo);
        return $dados;
    }

    function listarFuncionarioLoja($loja)
    {

        $dados = $this->funcionario->getFuncionariosByLoja($loja);
        foreach ($dados as $colaborador) {

            $codigo = $colaborador['codigo'];
            $nome =  $colaborador['nome'];
            $telefone =  $colaborador['telefone'];
            $cargo =  FuncionarioController::$cargos[$colaborador['perfil']];


            echo '
            <tr>
            <td>' . $nome . '</td>
            <td>' . $cargo . '</td>
            <td>' . $telefone . '</td>
            
            
            
            </tr>
            
            ';
        }
    }

    function editarFuncionario($campos)
    {

        $this->funcionario->editarFuncionario($campos);
    }

    function login($user, $campos)
    {
        $usuario = $this->funcionario->getLogin($user, $campos);
        if ($usuario != null) {
            session_start();
            $_SESSION['id'] = $usuario['codigo'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['nivel_acesso'] = $usuario['perfil'];
        } else {
            header("location: ../index.php?falhaLogin");
        }
    }

    function apagarArquivo($id){
        $this->funcionario->excluirArquivo($id);
    }

    function sair()
    {
        session_start();
        session_destroy();
        header('../index.php');
    }
}

$controller = new FuncionarioController();

if (isset($_POST['method']) && $_POST['method'] == "editarFuncionario") {
    $id = $_POST['id'];
    $campos = [
        "codigo" => $id, "nome" => $_POST['nome'], "data" => $_POST['data'], "cpf" => $_POST['cpf'], "endereco" => $_POST['endereco'], "telefone" => $_POST['telefone'],
        "email" => $_POST['email'],  "cep" => $_POST['cep'], "loja" => $_POST['loja'],  "cidade" => $_POST['cidade'],  "classe" => $_POST['classe']
    ];

    $controller->editarFuncionario($campos);
}

if (isset($_POST['method']) && $_POST['method'] == "login") {
    $user = $_POST['user'];
    $senha = $_POST['password'];
    var_dump($user);
    var_dump($senha);
    $controller->login($user, $senha);
}

if (isset($_POST['method']) && $_POST['method'] == "apagarArquivo") {
    $id = $_POST['numero'];

    $controller->apagarArquivo($id);
}

if (isset($_POST['numero'])) {
    require_once '../views/pdfs/projects.php';
    Projects::listarDocumentos($_POST['numero']);
}
