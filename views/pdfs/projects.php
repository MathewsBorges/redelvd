<?php
include_once '../models/Contracheque.php';

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
                <tr>
                <td><a href="pdfs/display.php?id=' . $row['id'] . ' " target="_blank"><i class="fa-regular fa-file me-2"></i>' . $row['nome'] . '</a></td>
                
                <td>' . $row['tipo'] . '</td>
                <td>' . $date->format('d/m/Y') . '</td>
                <td><form action="pdfs/excluirDocumento.php" method="post">
                <input type="hidden" name="id" value="' . $row['id'] . '">
                

                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>

              
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
            $sql = BDconexao::getConexao()->prepare("SELECT codigo, tipo_documento, data_emissao, nome_documento FROM documentos_farmacia where fk_farmacia = :id");
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
                    <tr>
               
    
                    <td><a href="pdfs/display.php?doc=' . $row['id'] . ' " target="_blank"><i class="fa-regular fa-file me-2"></i>' . $row['nome'] . '</a></td>
                    
                    <td>' . $row['tipo'] . '</td>
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
                    <tr>
        
                    <td><a href="pdfs/displayCheque.php?doc=' . $row['id'] . ' " target="_blank">' . $row['nome'] . '</a></td>
                    <td>' . $date->format('d/m/Y') . '</td>
                    <td>' . $row['mes_competencia'] . '</td>
                    <td> 
                 
                    <input type="hidden" name="codcheque" value="' . $row['id'] . '">
                    <button type="submit" data-toggle="modal" data-target="#exampleModalCenter" num="' . $row['id'] . ' "class="btn"><i class="fa-solid fa-trash text-danger"></i></button></td>

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
        echo '
        <div class="col-md-12 ms-4 cheque">
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
    }
}
