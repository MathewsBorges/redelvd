<?php

require_once("../connection/BDconexao.php");

class Funcionario
{

    protected $bd;

    public function __construct()
    {
        $this->bd = BDconexao::getConexao();
    }

    public function getLojas()
    {
        $query = $this->bd->prepare("SELECT * from empresa");
        $query->execute();
        $dados = $query->fetchAll();
        return $dados;
    }


    public function getFuncionarios()
    {
        $query = $this->bd->prepare("SELECT codigo, nome, loja, perfil from colaborador where status= 'A' ");
        $query->execute();
        $dados = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function getNomeFuncionario($id)
    {
        $query = $this->bd->prepare("SELECT nome from colaborador where codigo= :id ");
        $query->bindValue(":id", $id);
        $query->execute();
        $dados = $query->fetch();
        return $dados;
    }

    public function getFuncionario($codigo)
    {
        $query = $this->bd->prepare("SELECT * from colaborador where codigo=:codigo");
        $query->bindValue(":codigo", $codigo);
        $query->execute();
        $dados = $query->fetch();
        return $dados;
    }

    public function getFuncionariosByLoja($loja)
    {
        $query = $this->bd->prepare("SELECT codigo, nome, perfil, telefone from colaborador where loja=:loja");
        $query->bindValue(":loja", $loja);
        $query->execute();
        $dados = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function listarDocumentosFuncionario()
    {
        $query = $this->bd->prepare("SELECT * from funcionario_documentos");
        $query->execute();
        $dados = $query->fetch();
        $arquivo = base64_decode($dados['arquivo']);

        header('Content-type: application/pdf');
        readfile($arquivo);

        //    return $dados;
    }

    public function editarFuncionario($campos)
    {
        try {
            echo 'entrou';
            print_r($campos);
            //$email = $campos['email'] != "" ? $campos['email'] : "vazio";
            //  $cep = $campos['cep'] != "" ? $campos['cep'] : "00000-000";
            $cidade = 0;
            switch ($campos['cidade']) {
                case 'Camaquã':
                    $cidade = 5059;
                    break;
                case 'Rio Grande':
                    $cidade = 5096;
                    break;
                case 'Pelotas';
                    $cidade = 5089;
                    break;
                case 'Arambaré':
                    $cidade = 5047;
                    break;
                case 'Cristal':
                    $cidade = 5086;
                    break;
                case 'Chuvisca':
                    $cidade = 5051;
                    break;
                default:
                    break;
            }

            $query = BDconexao::getConexao()->prepare("UPDATE colaborador set nome = :nome, data_n = :data, cpf = :cpf, 
            endereco = :endereco, telefone = :telefone, email = :email, cep = :cep, loja = :loja,  cidade = :cidade, classe = :classe where codigo = :id");
            $query->bindValue(":nome", $campos["nome"]);
            $query->bindValue(":data", $campos['data']);
            $query->bindValue(":cpf", $campos['cpf']);
            $query->bindValue(":endereco", $campos['endereco']);
            $query->bindValue(":telefone", $campos['telefone']);
            $query->bindValue(":email", $campos['email']);
            $query->bindValue(":cep", $campos['cep']);
            $query->bindValue(":loja", $campos['loja']);
            $query->bindValue(":cidade", $cidade);
            $query->bindValue(":classe", $campos['classe']);
            $query->bindValue(":id", $campos['codigo']);

            $query->execute();
            $id = $campos['codigo'];
            header("location: ../views/crudUsuario.php?id=$id&status=success");
        } catch (\Throwable $th) {
            header("location: ../views/crudUsuario.php?id=$id&status=failed");
        }
    }

    public function getLogin($user, $senha){
        $query = $this->bd->prepare("SELECT * from colaborador where cpf = :user && senha = :senha");
        $query->bindValue(":user", $user);
        $query->bindValue(":senha", $senha);
        $usuario = $query->fetch();
        return $usuario;
    }
}
