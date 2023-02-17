<?php
require_once '../../connection/BDconexao.php';



if (!empty($_FILES['pdf']['name'])) {

    if ($_FILES['pdf']['error'] != 0) {
        echo 'Algo de errado com o arquivo';
    } else {
        $file_name = $_FILES['pdf']['name'];
        $file_tmp = $_FILES['pdf']['tmp_name'];
        $data = date("d/m/Y");
        $id_funcionario = $_POST['codigo'];
        if ($pdf_blob = fopen($file_tmp, "rb")) {
            try {

                $data = date('d/m/Y');
                $query = BDconexao::getConexao()->prepare("INSERT into contracheque (fk_funcionario, salario, ferias, outros,  convenio_farmacia, vales, emprestimos, nome_documento, documento, mes_competencia, data_geracao) values
             (:id, :salario, :ferias, :outros, :convenio_farmacia, :vales, :emprestimos, :nome_documento, :documento, :mes_competencia, :data_geracao )");
                $query->bindValue(":id", $id_funcionario);
                $query->bindValue(":salario", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", $_POST['salario']))));
                $query->bindValue(":ferias", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", $_POST['ferias']))));
                $query->bindValue(":outros", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", $_POST['outros']))));

                $query->bindValue(":convenio_farmacia", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", $_POST['convenio']))));
                $query->bindValue(":vales", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", $_POST['vales']))));
                $query->bindValue(":emprestimos", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", $_POST['emprestimos']))));
              
                $query->bindValue(":nome_documento", $file_name);
                $query->bindValue(":documento",  $pdf_blob, PDO::PARAM_LOB);
                $query->bindValue(":mes_competencia", $_POST['mes']);
                $query->bindValue(":data_geracao", $data);
                $query->execute();


                header("location: ../crudUsuario.php?id=$id_funcionario&status=fileUploaded");
            } catch (PDOException $e) {
                echo 'Database Error ' . $e->getMessage() . ' em ' . $e->getFile() .
                    ': ' . $e->getLine();
                // header("location: ../crudUsuario.php?id=$id_funcionario&status=fileError");
            }
        } else {

            header("location: ../crudUsuario.php?id=$id_funcionario&status=fileError");
        }
    }
} else {

    header('Location: choose_file.php');
}