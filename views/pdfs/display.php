<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    include  "../../connection/BDconexao.php";
    $id = htmlspecialchars($_GET['id']);
    $query = BDconexao::getConexao()->prepare("SELECT conteudo, nome_documento FROM funcionario_documentos WHERE codigo= :id");

    $query->bindValue(':id', $id);
    $query->bindColumn(1, $lob, PDO::PARAM_LOB);
    $query->execute();

    if ($query->execute() === FALSE) {
        echo 'Erro ao executar busca por pdf';
    } else {
        $dados = $query->fetch();


        switch (strtolower(substr(strrchr($dados['nome_documento'], "."), 1))) {
            case "pdf":
                header("Content-Type: application/pdf");
                header("Content-Disposition: filename=" . $dados['nome_documento']);

                break;
            case "xlsx":
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                break;
            case "xls":
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                break;
            case "doc":
                header("Content-Type: application/msword");
                header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                break;
            case "docx":
                header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
                header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                break;
            case "word":
                header("Content-Type: application/msword");
                header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                break;
            case "pptx":
                header("Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation");
                header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                break;
            case "txt":
                header("Content-Type: application/text/plain");
                header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
        }

        fpassthru($lob);
    }
} else {


    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['doc'])) {
        include  "../../connection/BDconexao.php";
        $id = htmlspecialchars($_GET['doc']);
        $query = BDconexao::getConexao()->prepare("SELECT documento, nome_documento FROM documentos_farmacia WHERE codigo= :id");

        $query->bindValue(':id', $id);
        $query->bindColumn(1, $lob, PDO::PARAM_LOB);
        $query->execute();

        if ($query->execute() === FALSE) {
            echo 'Erro ao executar busca por pdf';
        } else {
            $dados =  $query->fetch();
            switch (strtolower(substr(strrchr($dados['nome_documento'], "."), 1))) {
                case "pdf":
                    header("Content-Type: application/pdf");
                    header("Content-Disposition: filename=" . $dados['nome_documento']);
                    break;
                case "xlsx":
                    header("Content-Type: application/vnd.ms-excel");
                    header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                    break;
                case "xls":
                    header("Content-Type: application/vnd.ms-excel");
                    header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                    break;
                case "doc":
                    header("Content-Type: application/msword");
                    header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                    break;
                case "docx":
                    header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
                    header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                    break;
                case "word":
                    header("Content-Type: application/msword");
                    header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                    break;
                case "pptx":
                    header("Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation");
                    header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
                    break;
                case "txt":
                    header("Content-Type: application/text/plain");
                    header("Content-Disposition: attachment; filename=" . $dados['nome_documento']);
            }
            fpassthru($lob);
        }
    } else {
        header('location: projects.php');
    }
}
