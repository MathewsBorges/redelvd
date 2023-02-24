<?php
require_once("../models/Aviso.php");
require_once("../models/Funcionario.php");

class AvisoController
{
    protected $aviso;

    function __construct()
    {
        $this->aviso = new Aviso();
    }

    function listarAvisos($codigo)
    {
        $dados = $this->aviso->listarAvisos($codigo);
        foreach ($dados as $aviso) {

            $date =  new DateTime($aviso['data_envio']);
            $prioridade = [
                "IMPORTANTE" => "bg-danger",
                "URGENTE" => "bg-warning",
                "NORMAL" => "bg-success"
            ];

            $funcionario = new Funcionario();
            $user = $funcionario->getFuncionario($aviso['id_user']);

            echo '
           <div class="media text-muted pt-3 border-bottom border-gray">
                 <span class="badge ' . $prioridade[$aviso['prioridade']] . ' me-5">' . $aviso['prioridade'] . '</span>

             <p class="media-body pb-3 mb-0 small lh-125 text-break">
                 <strong class="d-block text-gray-dark">@' . $user['nome'] . '</strong>
                ' . $aviso['mensagem'] . '

             </p>
            <div class="d-flex justify-content-between">
               <p class="me-5">Data de Envio: ' . $date->format('d/m/Y') . '</p>
            </div>
            </div>
           ';
        }
    }

    function listarAvisosTabela($codigo)
    {
        $funcionario = new Funcionario();
        $dados = $this->aviso->listarAvisos($codigo);


        foreach ($dados as $aviso) {
            $date =  new DateTime($aviso['data_envio']);
            $user =  $funcionario->getFuncionario($aviso['id_user']);

            echo '
            <tr col="'.$aviso['codigo'].'">
            <td>' . $aviso['prioridade'] . '</td>
            <td>' . $date->format('d/m/Y') . '</td>
            <td>' . $user['nome'] . '</td>
            <td class="d-flex">
            
            <button type="button"  data-bs-placement="top" title="Visualizar" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal' . $aviso['codigo'] . '">
                <i class="fa-regular fa-eye"></i>
            </button>
             
                <button data-bs-placement="top" title="Apagar Mensagem" class="btn" data-toggle="modal" data-target="#exampleModalCenter'.$aviso['codigo'] .' "class="btn"><i class="fa-solid fa-trash text-danger"></i></button>


  
            </td>
            <div class="modal fade" id="exampleModal' . $aviso['codigo'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content modal-dialog-scrollable">
                    <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Mensagem do Funcionário</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                 <div class="modal-body">
                     ' . $aviso['mensagem'] . '
                 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
    
                </div>
                </div>
             </div>
            </div> 

             <div class="modal fade" id="exampleModalCenter'.   $aviso['codigo']  .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Apagar Aviso</h5>
                    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja apagar o Aviso? Lembre-se, não será possível recuper após isso e o funcionário não terá mais acesso ao aviso</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" data-dismiss="modal" onclick="excluirAviso('.  $aviso['codigo']  .')" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Apagar</button>
                </div>
              </div>
             </div>
             </div>

        
            </tr>

         ';
        }
    }



    function mostrarAviso($id)
    {
        $dados = $this->aviso->mostrarAviso($id);
        return $dados;
    }

    function insertAviso($campos)
    {
        $this->aviso->insertAviso($campos);
    }

    function removerAviso($cod)
    {
        $this->aviso->removerAviso($cod);
    }

    function tabelaAviso($id){
        $this->aviso->tabelaAviso($id);
    }
}

////--------------------------- FORM FUNCTIONS 
$controller = new AvisoController();

if (isset($_POST['method']) && $_POST['method'] == "insertAviso") {

    $campos = ["mensagem" => $_POST['mensagem'], "prioridade" => $_POST['prioridade'], "remetente" => $_POST['remetente'], "id" => $_POST['numero']];
    $controller->insertAviso($campos);

}

if (isset($_POST['method']) && $_POST['method'] == "removerAviso") {
    $cod = $_POST['numero'];
    $controller->removerAviso($cod);
}

if (isset($_POST['method']) && $_POST['method'] == "listarAvisos") {
    $id = $_POST['numero'];
    $controller->listarAvisosTabela($id);
}
