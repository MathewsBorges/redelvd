<?php
require_once '../connection/BDconexao.php';


class Empresa
{
    protected $bd;

    public function __construct()
    {
        $this->bd = BDconexao::getConexao();
    }

    public function getLojas()
    {
        $query = $this->bd->prepare("SELECT * from empresa order by nome_res");
        $query->execute();
        $dados = $query->fetchAll();
        return $dados;
    }

    public function getCargos()
    {
        $query = $this->bd->prepare("SELECT codigo, nome from perfil");
        $query->execute();
        $dados = $query->fetchAll();
        return $dados;
    }

    public function apagarArquivo($id)
    {
        $query = $this->bd->prepare("Delete from documentos_farmacia where codigo = $id");
        $query->execute();
        echo '  <div class="alert alert-success" role="alert" id="msg">
                    <i class="fa-regular fa-circle-check me-2"></i> Arquivo apagado com Sucesso
                </div>';
    }
}
