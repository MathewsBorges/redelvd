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
            <tr>
            <td>' . $aviso['prioridade'] . '</td>
            <td>' . $date->format('d/m/Y') . '</td>
            <td>' . $user['nome'] . '</td>
            <td class="d-flex">
            
            <button type="button"  data-bs-placement="top" title="Visualizar" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal' . $aviso['codigo'] . '">
                <i class="fa-regular fa-eye"></i>
            </button>
          
            <form action="../controllers/AvisoController.php" method="post" >
            <input type="hidden" name="method" value="removerAviso"/>

                <input type="hidden" name="id" value="' . $aviso['codigo'] . '"/>
                <input type="hidden" name="caminho" value="../views/crudUsuario.php?id=' . $user['codigo'] . '"/>


                <button type="submit"  data-bs-placement="top" title="Apagar Mensagem" class="btn">
                <input type="hidden" name="id_funcionario" value="' . $user['codigo'] . '">
                <i class="fa-solid fa-trash" style="color: red"></i>
            </button>
            </form>
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

    function removerAviso($cod, $caminho)
    {
        $this->aviso->removerAviso($cod,  $caminho);
    }
}

////--------------------------- FORM FUNCTIONS 
$controller = new AvisoController();

if (isset($_POST['method']) && $_POST['method'] == "insertAviso") {

    $campos = ["mensagem" => $_POST['mensagem'], "prioridade" => $_POST['prioridade'], "remetente" => $_POST['remetente'], "id" => $_POST['numero']];
    $controller->insertAviso($campos);

}

if (isset($_POST['method']) && $_POST['method'] == "removerAviso") {
    $cod = $_POST['id'];
    $id = $_POST['id_funcionario'];
    $caminho = $_POST['caminho'];
    $controller->removerAviso($cod, $caminho);
}

if (isset($_POST['method']) && $_POST['method'] == "listarAvisos") {
    $id = $_POST['numero'];
    $controller->listarAvisosTabela($id);
}
