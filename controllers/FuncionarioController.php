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

    static protected $cargos  = ["G" => "Gerente", "V" => "Vendedor", "T" => "Farmaceutica", "S" => "Supervisor", "A" => "Auxiliar Admnistrativo", "X" => "X", "U" => "U", "E" => "Entregador", "F" => "Financeiro"];

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

            $cargo =  FuncionarioController::$cargos[$colaborador['classe']];


            echo '
            <tr>
            <td>' . $codigo . '</td>
            <td>' . $nome . '</td>
            <td>' . $cargo . '</td>
            <td>' . $this->loja . '</td>

            <td>
            <form action="crudUsuario.php" method="post">
                <button class="btn" data-bs-placement="top" title="Editar Funcionário" ><i class="fa-solid fa-pen-to-square" style="color: blue"></i></button>
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
            $cargo =  FuncionarioController::$cargos[$colaborador['classe']];


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
    $controller->login($user, $senha);
}