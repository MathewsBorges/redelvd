<?php
require_once("../connection/BDconexao.php");
require_once("../models/Funcionario.php");

class Aviso
{
    protected $bd;
    protected $f;
    public function __construct()
    {
        $this->bd = BDconexao::getConexao();
        $this->f  = new Funcionario();
    }

    public function listarAvisos($id)
    {
        $query = $this->bd->prepare("SELECT * FROM avisos_funcionario where id_user = :id");
        $query->bindValue(":id", $id);
        $query->execute();
        $dados = $query->fetchAll();
        return $dados;
    }

    public function tabelaAviso($id)
    {


        // Obter os registros do banco de dados
        $sql = "SELECT * FROM avisos_funcionario where id_user=$id";
        $stmt = $this->bd->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Exibir os registros na tabela


        foreach ($result as $row) {
            $date =  new DateTime($row['data_envio']);
            $obj = $this->f->getNomeFuncionario($row['remetente']);
        
            $alert = ["URGENTE" => "warning", "NORMAL" => "success", "IMPORTANTE" => "danger"];
            echo '
            <tr>
            <td hidden>' . $row['prioridade'] . '</td>
            <td>
            <div class="media text-muted pt-3 border-bottom border-gray">
            <span class="badge bg-' . $alert[$row['prioridade']] . ' me-5">' . $row['prioridade'] . '</span>

            <p class="media-body pb-3 mb-0 small lh-125 ">
                <strong class="d-block text-gray-dark">@ '. $obj['nome'] .'</strong>
                ' . $row['mensagem'] . '

            </p>
            <div class="d-flex justify-content-between">
                <p class="me-5">Data de Envio: ' . $date->format('d/m/Y') . '</p>
                <button type="button" class="btn"> <i class="fa-solid fa-trash"></i> </button>
            </div>
        </div>
        </td>
        </tr>
            ';
        }
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
        if (!empty($_POST['mensagem'])) {
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

                echo '<div class="alert alert-success" role="alert" id="msg">
                         <i class="fa-regular fa-circle-check me-2"></i> Aviso enviado com Sucesso!
                     </div>';
            } catch (\Throwable $th) {
                echo '<div class="alert alert-danger" role="alert" id="msg">
                        <i class="fa-regular fa-circle-exclamation me-2"></i>Não foi possivel enviar o aviso, erro: ' . $th . '
                     </div>';
            }
        } else {
            echo '<div class="alert alert-warning" id="msg" role="alert">
                     <i class="fa-solid fa-triangle-exclamation me-2"></i> Ops! Preencha o campo aviso
                </div>';
        }
    }

    public function removerAviso($cod)
    {
        try {
            $query = BDconexao::getConexao()->prepare("DELETE FROM avisos_funcionario where codigo = :id");
            $query->bindValue(":id", $cod);
            $query->execute();
            echo '<div class="alert alert-success" role="alert" id="msg">
                    <i class="fa-regular fa-circle-check me-2"></i> Aviso apagado com Sucesso
                  </div>
            ';
        } catch (\Throwable $th) {
            echo '<div class="alert alert-danger" role="alert" id="msg">
                     <i class="fa-regular fa-circle-exclamation me-2"></i>Não foi possivel apagar o aviso, erro: ' . $th . '
                 </div>';
        }
    }
}
