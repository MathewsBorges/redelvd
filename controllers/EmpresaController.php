<?php
require_once("../models/Empresa.php");

class EmpresaController
{
    protected $empresa;

    function __construct()
    {
        $this->empresa = new Empresa();
    }

    function listarLojas($loja)
    {


        $dados = $this->empresa->getLojas();
        foreach ($dados as $empresa) {

            echo ' <option value="'. $empresa['codigo'].'"   '. ($empresa['codigo']==$loja ? " selected":" ").'> REDE ' . $empresa['nome_res'] . '</option>';
        }
    }

}
