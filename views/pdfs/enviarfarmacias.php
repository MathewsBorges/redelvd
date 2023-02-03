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
        if ($pdf_blob = fopen($file_tmp, "rb")) {
            try {

                $insert_sql = "INSERT INTO documentos_farmacia (tipo_documento, data_emissao, fk_farmacia, documento, nome_documento) VALUES(:tipo, :data, :fk, :pdf_doc, :nome_documento)";
                $stmt = BDconexao::getConexao()->prepare($insert_sql);
                $stmt->bindValue(':tipo', $tipo);
                $stmt->bindValue(':data', $data);
                $stmt->bindValue(':fk', 2);
                $stmt->bindParam(':pdf_doc', $pdf_blob, PDO::PARAM_LOB);
                $stmt->bindValue(':nome_documento', $file_name);

                $stmt->execute();
                header("location: ../painel.php");
            } catch (PDOException $e) {
                echo 'Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
                    ': ' . $e->getLine();
            }
        } else {

            echo 'erro';
        }
    }
} else {

    header('Location: choose_file.php');
}
