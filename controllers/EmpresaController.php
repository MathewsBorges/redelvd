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

    function listarCargos($id)
    {


        $dados = $this->empresa->getCargos();
        foreach ($dados as $cargo) {

            echo ' <option value="'. $cargo['codigo'].'"   '. ($cargo['codigo']==$id ? " selected":" ").'>' . $cargo['nome'] . '</option>';
        }
    }



}
