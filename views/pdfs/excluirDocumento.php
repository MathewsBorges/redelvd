<?php
require_once '../../connection/BDconexao.php';

if (isset($_POST['id_funcionario'])) {
    try {
        $id = $_POST['id'];
        $id_funcionario =  $_POST['id_funcionario'];
        $query = BDconexao::getConexao()->prepare("delete from funcionario_documentos where codigo = :id");
        $query->bindValue(":id", $id);
        $query->execute();
        header("location: ../crudUsuario.php?id=$id_funcionario&status=fileDeleted");
    } catch (\Throwable $th) {
        header("location: ../crudUsuario.php?id=$id_funcionario&status=fileDeletedError");
    }
} else {

    $id = $_POST['id'];
    $query = BDconexao::getConexao()->prepare("delete from funcionario_documentos where codigo = :id");
    $query->bindValue(":id", $id);
    $query->execute();
    header("location: ../painel.php");
}
