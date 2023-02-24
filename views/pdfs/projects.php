<?php
require_once '../models/Contracheque.php';

class Projects
{
    static function listarDocumentos($id)
    {
        require_once "../connection/BDconexao.php";

        try {
            $sql = BDconexao::getConexao()->prepare("SELECT codigo, nome_documento, tipo, data_emissao, fk_funcionario, conteudo  FROM funcionario_documentos where fk_funcionario = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            $result = $sql->fetchAll();
            if ($result != null) {
                foreach ($result as $row) {
                    $records[] = [
                        'id' => $row['codigo'],
                        'nome' => $row['nome_documento'],
                        'tipo' => $row['tipo'],
                        'data' => $row['data_emissao'],
                        'fk' => $row['fk_funcionario'],

                        'project_name' => $row['conteudo']
                    ];
                }
                foreach ($records as $row) {

                    $date =  new DateTime($row['data']);


                    echo '
                <tr col="' . $row['id'] . '">
                <td><a href="pdfs/display.php?id=' . $row['id'] . ' " target="_blank"><i class="fa-regular fa-file me-2"></i>' . $row['nome'] . '</a></td>
                
                <td>' . $row['tipo'] . '</td>
                <td>' . $date->format('d/m/Y') . '</td>
                <td>
                <button type="submit" data-toggle="modal" data-target="#exampleModalCenter' . $row['id'] . '" num="' . $row['id'] . ' "class="btn"><i class="fa-solid fa-file-circle-minus text-danger"></i></button></td>

                <div class="modal fade" id="exampleModalCenter' .  $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Apagar Documento</h5>
                <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 </div>
                     <div class="modal-body">
                         <p>Deseja apagar o documento? Lembre-se, não será possível recuperar após isso e o funcionário não terá mais acesso a ele</p>
                     </div>
                            <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                             <button type="button" data-dismiss="modal" onclick="excluirArquivo(' . $row['id'] . ')" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Apagar</button>
                            </div>
                     </div>
                </div>
            </div>
                </tr>
                ';
                }
            }
        } catch (PDOException $e) {
            echo 'Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
                ': ' . $e->getLine();
        }
    }

    static function listarDocumentosRh()
    {
        require_once "../connection/BDconexao.php";

        try {
            $sql = BDconexao::getConexao()->prepare("SELECT codigo, nome_documento, tipo, data_emissao, fk_funcionario, conteudo  FROM funcionario_documentos");
            $sql->execute();
            $result = $sql->fetchAll();
            if ($result != null) {
                foreach ($result as $row) {
                    $records[] = [
                        'id' => $row['codigo'],
                        'nome' => $row['nome_documento'],
                        'tipo' => $row['tipo'],
                        'data' => $row['data_emissao'],
                        'fk' => $row['fk_funcionario'],

                        'project_name' => $row['conteudo']
                    ];
                }
                foreach ($records as $row) {

                    $date =  new DateTime($row['data']);


                    echo '
                    <tr>
                    <td><a href="pdfs/display.php?id=' . $row['id'] . ' " target="_blank"><i class="fa-regular fa-file me-2"></i>' . $row['nome'] . '</a></td>
                    
                    <td>' . $row['tipo'] . '</td>
                    <td>' . $date->format('d/m/Y') . '</td>
                    <td>' . $row['fk'] . '
    
                  
                    </tr>
                    ';
                }
            }
        } catch (PDOException $e) {
            echo 'Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
                ': ' . $e->getLine();
        }
    }

    static function listarDocumentosFarmacia($id)
    {
        require_once "../connection/BDconexao.php";

        try {
            $sql = BDconexao::getConexao()->prepare("SELECT codigo, tipo_documento, data_emissao, nome_documento FROM documentos_farmacia where fk_farmacia = :id order by codigo desc");
            $sql->bindValue(":id", $id);
            $sql->execute();
            $result = $sql->fetchAll();
            if ($result != null) {
                foreach ($result as $row) {
                    $records[] = [
                        'id' => $row['codigo'],
                        'tipo' => $row['tipo_documento'],
                        'data' => $row['data_emissao'],
                        'nome' => $row['nome_documento'],
                        'project_name' => $row['nome_documento'],


                    ];
                }
                foreach ($records as $row) {

                    $date =  new DateTime($row['data']);


                    echo '
                    <tr col-arquivo="'.$row['id'].'">
               
    
                    <td><a href="pdfs/display.php?doc=' . $row['id'] . ' " target="_blank"><i class="fa-regular fa-file me-2"></i>' . $row['nome'] . '</a></td>
                    
                    <td>' . $row['tipo'] . '</td>
                    <td>' . $date->format('d/m/Y') . '</td>
                   
                    <td> 
                    <button type="submit" data-toggle="modal" data-target="#exampleModalCenter' . $row['id'] . '" num="' . $row['id'] . ' "class="btn"><i class="fa-solid fa-trash text-danger"></i></button></td>
                    <div class="modal fade" id="exampleModalCenter' .  $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                       <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Excluir Documento</h5>
                                <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                             <p>Deseja apagar o documento? Lembre-se, não será possível recuperar o documento após a ação</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" data-dismiss="modal" onclick="excluirDocumentoFarmacia(' . $row['id'] . ')" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Apagar</button>
                            </div>
                     </div>
                    </div>
                    </div>
                 </tr>
                    </td>
                  
                    </tr>
                    ';
                }
            }
        } catch (PDOException $e) {
            echo 'Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
                ': ' . $e->getLine();
        }
    }

    static function listarContracheque($id)
    {
        require_once "../connection/BDconexao.php";

        try {
            $sql = BDconexao::getConexao()->prepare("SELECT codigo, nome_documento, documento, mes_competencia, data_geracao FROM contracheque where fk_funcionario= :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            $result = $sql->fetchAll();
            if ($result != null) {
                foreach ($result as $row) {
                    $records[] = [
                        'id' => $row['codigo'],
                        'nome_documento' => $row['nome_documento'],
                        'data' => $row['data_geracao'],
                        'nome' => $row['nome_documento'],
                        'project_name' => $row['nome_documento'],
                        'mes_competencia' => $row['mes_competencia']


                    ];
                }
                foreach ($records as $row) {

                    $date =  new DateTime($row['data']);


                    echo '
                <tr col="' . $row['id'] . '">
        
                    <td><a href="pdfs/displayCheque.php?doc=' . $row['id'] . ' " target="_blank">' . $row['nome'] . '</a></td>
                    <td>' . $date->format('d/m/Y') . '</td>
                    <td>' . $row['mes_competencia'] . '</td>
                    <td> 
                 
                    <input type="hidden" name="codcheque" value="' . $row['id'] . '">
                    <button type="submit" data-toggle="modal" data-target="#exampleModalCenter' . $row['id'] . '" num="' . $row['id'] . ' "class="btn"><i class="fa-solid fa-trash text-danger"></i></button></td>

                    <div class="modal fade" id="exampleModalCenter' .  $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                       <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Apagar Contracheque</h5>
                                <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                             <p>Deseja apagar o contracheque? Lembre-se, não será possível recuperalo após isso e o funcionário não terá mais acesso</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" data-dismiss="modal" onclick="excluirCheque(' . $row['id'] . ')" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Apagar</button>
                            </div>
                     </div>
                    </div>
                    </div>
                 </tr>

                    ';
                }
            }
        } catch (PDOException $e) {
            echo 'Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
                ': ' . $e->getLine();
        }
    }

    static function listarContrachequeLoja($id)
    {
        require_once "../connection/BDconexao.php";

        try {

            $sql = BDconexao::getConexao()->prepare('SELECT c.*, f.nome
            FROM (
                SELECT fk_funcionario, MAX(data_geracao) AS ultima_data 
                FROM contracheque 
                GROUP BY fk_funcionario
            ) AS ultimos_contracheques 
            INNER JOIN contracheque c ON c.fk_funcionario = ultimos_contracheques.fk_funcionario AND c.data_geracao = ultimos_contracheques.ultima_data 
            INNER JOIN colaborador f ON ultimos_contracheques.fk_funcionario = f.codigo
            WHERE f.loja = :id');
            $sql->bindValue(":id", $id);
            $sql->execute();
            $result = $sql->fetchAll();
            if ($result != null) {
                foreach ($result as $row) {
                    $records[] = [
                        'id' => $row['codigo'],
                        'nome_funcionario' => $row['nome'],
                        'nome_documento' => $row['nome_documento'],
                        'data' => $row['data_geracao'],
                        'nome' => $row['nome_documento'],
                        'project_name' => $row['nome_documento']



                    ];
                }
                foreach ($records as $row) {

                    $date =  new DateTime($row['data']);


                    echo '
                 <tr>
                    <td>' . $row['nome_funcionario'] . '</td>
                    <td><a href="pdfs/displayCheque.php?doc=' . $row['id'] . ' " target="_blank">' . $row['nome'] . '</a></td>
                    <td>' . $date->format('d/m/Y') . '</td>
                 
                    
                 </tr>

                    ';
                }
            }
        } catch (PDOException $e) {
            echo 'Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
                ': ' . $e->getLine();
        }
    }


    static function listarContrachequeFuncionario($id)
    {
        require_once "../connection/BDconexao.php";

        try {
            $sql = BDconexao::getConexao()->prepare("SELECT codigo, nome_documento, documento, mes_competencia, data_geracao FROM contracheque where fk_funcionario= :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            $result = $sql->fetchAll();
            if ($result != null) {
                foreach ($result as $row) {
                    $records[] = [
                        'id' => $row['codigo'],
                        'nome_documento' => $row['nome_documento'],
                        'data' => $row['data_geracao'],
                        'nome' => $row['nome_documento'],
                        'project_name' => $row['nome_documento'],
                        'mes_competencia' => $row['mes_competencia']
                    ];
                }
                foreach ($records as $row) {

                    $date =  new DateTime($row['data']);


                    echo '
                    <tr>
               
                    <td><a href="pdfs/displayCheque.php?doc=' . $row['id'] . ' " target="_blank">' . $row['nome'] . '</a></td>
                    <td>' . $date->format('d/m/Y') . '</td>
                    <td>' . $row['mes_competencia'] . '</td>
                
                    </tr>
                    ';
                }
            }
        } catch (PDOException $e) {
            echo 'Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
                ': ' . $e->getLine();
        }
    }

    static function downloadCheque($id)
    {
        $cheque = new Contracheque();
        $dados = $cheque->getLastContraCheque($id);
        if (!empty($dados)) {
            echo '
            <div class="col-md-12 cheque">
            <div class="arquivo">
                <p>Arquivo: </p>
                <p><td><a href="pdfs/displayCheque.php?doc=' . $dados['codigo'] . ' " target="_blank">' . $dados['nome_documento'] . '</a></td>
                </p>
            </div>
            <div class="mes">
                <p>Mês de Competência: </p>
                <p>' . $dados['mes_competencia'] . '</p>
            </div>
            </div>
            ';
        } else {
            echo '<div class="col-md-12 ms-4">
            <p>Não há contracheques para baixar</p>
            <div>';
        }
    }

}
