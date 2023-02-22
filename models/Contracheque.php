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
        $query = $this->bd->prepare("SELECT * from contracheque where fk_funcionario = :id order by codigo desc");
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

    public function getLastContraCheque($id)
    {
        $query = $this->bd->prepare("SELECT * from contracheque where fk_funcionario = :id order by codigo desc limit 1");
        $query->bindValue(":id", $id);
        $query->execute();
        $dados = $query->fetch();
        return $dados;
    }

    
}
