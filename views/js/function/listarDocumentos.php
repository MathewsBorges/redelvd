<?php
require_once "../../../connection/BDconexao.php";

$id = $_POST['numero'];

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
            <td>
            <form action="pdfs/excluirDocumento.php" method="post">
                <input type="hidden" name="id" value="' . $row['id'] . '">
                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
            </form>
            </tr>
            ';
        }
    }
} catch (PDOException $e) {
    echo 'Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
        ': ' . $e->getLine();
}
