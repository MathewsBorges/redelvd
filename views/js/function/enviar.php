<?php
require_once '../../../connection/BDconexao.php';


if (!empty($_FILES['pdf_file']['name'])) {

    if ($_FILES['pdf_file']['error'] != 0) {
        echo 'Algo de errado com o arquivo';
    } else {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        $tipo = $_POST['tipo'];
        $data = date("d/m/Y");
        $id_funcionario = 266;
        if ($pdf_blob = fopen($file_tmp, "rb")) {
            try {

                $insert_sql = "INSERT INTO funcionario_documentos (nome_documento, tipo, data_emissao, fk_funcionario, conteudo) VALUES(:nome, :tipo, :data, :fk, :pdf_doc);";
                $stmt = BDconexao::getConexao()->prepare($insert_sql);
                $stmt->bindValue(':nome', $file_name);
                $stmt->bindValue(':tipo', $tipo);
                $stmt->bindValue(':data', $data);
                $stmt->bindValue(':fk', $id_funcionario);
                $stmt->bindParam(':pdf_doc', $pdf_blob, PDO::PARAM_LOB);
                $stmt->execute();

                if (isset($_POST['crud'])) {
                    // header("location: ../crudUsuario.php?id=$id_funcionario&status=fileUploaded");
                    echo '<div class="alert alert-success" role="alert">
                    <i class="fa-regular fa-circle-check me-2"></i> Arquivo Anexado com Sucesso!
                 </div>';
                } else {
                    // header("location: ../painel.php");
                    echo '<div class="alert alert-success" role="alert" id="msg">
                    <i class="fa-regular fa-circle-check me-2"></i> Arquivo Anexado com Sucesso!
                 </div>';
                }
            } catch (PDOException $e) {

                echo '<div class="alert alert-danger" role="alert">
                <i class="fa-regular fa-circle-check me-2"></i> Erro banco de dados, consulte um Administrador, 
                Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
                    ': ' . $e->getLine() . '
             </div>';
            }
        } else {
            if (isset($_POST['crud'])) {
                // header("location: ../crudUsuario.php?id=$id_funcionario&status=fileError");
                echo '<h1>Deu ruim no arquivo<h1>';
            }
            echo 'erro';
        }
    }
} else {

    // header('Location: choose_file.php');
    echo '<div class="alert alert-warning" id="msg" role="alert">
    <i class="fa-solid fa-triangle-exclamation me-2"></i> Ops! O Arquivo não foi anexado
  </div>';
}

?>
