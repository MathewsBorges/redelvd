<?php
require_once("../models/Funcionario.php");


class FuncionarioController
{
    protected $funcionario;

    function __construct()
    {
        $this->funcionario = new Funcionario();
    }

    static protected $cargos  = ["G" => "Gerente", "V" => "Vendedor", "T" => "Farmaceutica", "S" => "Supervisor", "A" => "Auxiliar Admnistrativo", "X" => "X", "U" => "U", "E" => "Entregador", "F" => "Financeiro"];
    static protected $lojas = [1 => "Matriz ", 2 => "Loja 02", 3 => "Loja 03", 4 => "Loja 04", 5 => "Loja 05", 6 => "Loja 06", 7 => "Loja 07", 8 => "Loja 08", 9 => "Loja 09", 10 => "Loja 10", 11 => "Loja 11", 12 => "Loja 12", 13 => "Loja 13", 14 => "Loja 14", 15 => "Loja 15",  16 => "Loja 16", 17 => "Loja 17", 18 => "Loja 18", 99 => "Depósito"];


    function listarFuncionario()
    {

        $dados = $this->funcionario->getFuncionarios();

        foreach ($dados as $colaborador) {

            $codigo = $colaborador['codigo'];
            $nome =  $colaborador['nome'];
            $loja = FuncionarioController::$lojas[$colaborador['loja']];
            $cargo =  FuncionarioController::$cargos[$colaborador['classe']];


            echo '
            <tr>
            <td>' . $codigo . '</td>
            <td>' . $nome . '</td>
            <td>' . $cargo . '</td>
            <td>' . $loja . '</td>

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
