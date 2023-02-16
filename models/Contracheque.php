<?php
require_once '../connection/BDconexao.php';
class Contracheque
{
    protected $bd;
    public function __construct()
    {
        $this->bd = BDconexao::getConexao();
    }


    public function getContrachequeID($id)
    {
        $query = $this->bd->prepare("SELECT * from contracheque where fk_funcionario = :id ");
        $query->bindValue(":id", $id);
        $query->execute();
        $dados = $query->fetchAll();
        return $dados;
    }

    public function getContracheque()
    {
        $query = $this->bd->prepare("SELECT * from contracheque");
        $query->execute();
        $dados = $query->fetchAll();
        return $dados;
    }

    public function insertCheque($campos)
    {
        try {
            $data = date('d/m/Y');
            $query = $this->bd->prepare("INSERT into contracheque (fk_funcionario, salario, ferias, outros, total_credito, convenio_farmacia, vales, emprestimos, total_debito, valor_total, nome_documento, documento, mes_competencia) values
         (:id, :salario, :ferias, :outros, :total_credito, :convenio_farmacia, :vales, :emprestimos, :total_debito, :valor_total, :nome_documento, :documento, :mes_competencia )");
            $query->bindValue(":id", $campos['id']);
            $query->bindValue(":salario", $campos['salario']);
            $query->bindValue(":ferias", $campos['ferias']);
            $query->bindValue(":outros", $campos['outros']);
            $query->bindValue(":total_credito", $campos['total_cred']);
            $query->bindValue(":convenio_farmacia", $campos['convenio']);
            $query->bindValue(":vales", $campos['vales']);
            $query->bindValue(":emprestimos", $campos['emprestimos']);
            $query->bindValue(":total_debito", $campos['total_deb']);
            $query->bindValue(":valor_total", $campos['valor_total']);
            $query->bindValue(":nome_documento", $campos['nome_documento']);
            $query->bindValue(":documento", $campos['documento']);
            $query->bindValue(":mes_competencia", $campos['mes']);
            $query->bindValue(":data_geracao", $data);
            $query->execute();
        } catch (\Throwable $th) {
            echo 'Erro Ao emitir contracheque';
        }
    }
}
