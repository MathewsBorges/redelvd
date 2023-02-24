<?php
require_once '../../connection/BDconexao.php';


if (!empty($_FILES['pdf_file']['name'])) {
    if ($_FILES['pdf_file']['error'] != 0) {
        echo 'Algo de errado com o arquivo';
    } else {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        $tipo = $_POST['tipo'];
        $data = date("d/m/Y");
        $numFarmacia = $_POST['farmacia'];
        if ($pdf_blob = fopen($file_tmp, "rb")) {
            try {
                $insert_sql = "INSERT INTO documentos_farmacia (tipo_documento, data_emissao, fk_farmacia, documento, nome_documento) VALUES(:tipo, :data, :fk, :pdf_doc, :nome_documento)";
                $stmt = BDconexao::getConexao()->prepare($insert_sql);
                $stmt->bindValue(':tipo', $tipo);
                $stmt->bindValue(':data', $data);
                $stmt->bindValue(':fk', $numFarmacia);
                $stmt->bindParam(':pdf_doc', $pdf_blob, PDO::PARAM_LOB);
                $stmt->bindValue(':nome_documento', $file_name);
                $stmt->execute();
                //header("location: ../painel.php");
                echo '    <div class="alert alert-success" role="alert" id="msg">
                <i class="fa-regular fa-circle-check me-2"></i> Arquivo anexado com Sucesso
           </div>';
            } catch (PDOException $e) {
                echo 'Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
                    ': ' . $e->getLine();
            }
        } else {
            echo '    <div class="alert alert-danger" role="alert" id="msg">
            Não foi possivel adicionar
       </div>';
        }
    }
} else {

    echo '<div class="alert alert-warning" id="msg" role="alert">
    <i class="fa-solid fa-triangle-exclamation me-2"></i> Ops! O Arquivo não foi anexado
  </div>';
}
