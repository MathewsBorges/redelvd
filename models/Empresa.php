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
        $query = $this->bd->prepare("SELECT * from empresa");
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

}
