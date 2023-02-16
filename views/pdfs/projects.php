<?php

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
                

                <input  class="btn btn-danger"type="submit" value="Excluir"></form></td>

              
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
}
