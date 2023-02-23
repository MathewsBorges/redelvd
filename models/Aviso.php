<?php
require_once("../connection/BDconexao.php");

class Aviso
{
    protected $bd;

    public function __construct()
    {
        $this->bd = BDconexao::getConexao();
    }

    public function listarAvisos($id)
    {
        $query = $this->bd->prepare("SELECT * FROM avisos_funcionario where id_user = :id");
        $query->bindValue(":id", $id);
        $query->execute();
        $dados = $query->fetchAll();
        return $dados;
    }

    public function mostrarAviso($id)
    {
        $query = $this->bd->prepare("SELECT mensagem FROM avisos_funcionario where codigo = :id");
        $query->bindValue(":id", $id);
        $query->execute();
        $dados = $query->fetch();
        return $dados;
    }

    public function insertAviso($campos)
    {
        if(!empty($_POST['mensagem'])){
            $data = date('d/m/Y');
            try {
                $query = BDconexao::getConexao()->prepare("INSERT INTO avisos_funcionario (mensagem, prioridade, data_envio, remetente, id_user) values (:mensagem, :prioridade, :data_envio, :remetente, :id)");
                $query->bindValue(":mensagem", $campos['mensagem']);
                $query->bindValue(":prioridade", $campos['prioridade']);
                $query->bindValue(":data_envio", $data);
                $query->bindValue(":remetente", $campos['remetente']);
                $query->bindValue(":id", $campos['id']);
                $query->execute();
                $id = $campos['id'];
               // header("location: ../views/crudUsuario.php?id=$id&status=enviado");
               echo '<div class="alert alert-success" role="alert" id="msg">
               <i class="fa-regular fa-circle-check me-2"></i> Aviso enviado com Sucesso!
           </div>';
               
            } catch (\Throwable $th) {
                echo '<div class="alert alert-danger" role="alert" id="msg">
               <i class="fa-regular fa-circle-exclamation me-2"></i>Não foi possivel enviar o aviso, erro: '.$th.'
           </div>';
            }
        }else{
            echo '<div class="alert alert-warning" id="msg" role="alert">
            <i class="fa-solid fa-triangle-exclamation me-2"></i> Ops! Preencha o campo aviso
          </div>';
        }
      
    }

    public function removerAviso($cod, $caminho)
    {
        try {
            $query = BDconexao::getConexao()->prepare("DELETE FROM avisos_funcionario where codigo = :id");
            $query->bindValue(":id", $cod);
            $query->execute();
            header("location: $caminho&status=deleted");
        } catch (\Throwable $th) {
            header("location: $caminho&status=deletedFailed");


        }
    }
}
