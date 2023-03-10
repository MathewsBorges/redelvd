<?php
require_once '../../connection/BDconexao.php';

$id_funcionario = $_POST['codigo'];


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
                $query->bindValue(":salario", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", empty($_POST['salario']) ? "R$ 0,00" : $_POST['salario']))));
                $query->bindValue(":ferias", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", empty($_POST['ferias']) ? "R$ 0,00" : $_POST['ferias']))));
                $query->bindValue(":outros", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", empty($_POST['outros']) ? "R$ 0,00" : $_POST['outros']))));
                $query->bindValue(":convenio_farmacia", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", empty($_POST['convenio']) ? "R$ 0,00" : $_POST['convenio']))));
                $query->bindValue(":vales", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", empty($_POST['vales']) ? "R$ 0,00" : $_POST['vales']))));
                $query->bindValue(":emprestimos", str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", empty($_POST['emprestimos']) ? "R$ 0,00" : $_POST['emprestimos']))));
                $query->bindValue(":nome_documento", $file_name);
                $query->bindValue(":documento",  $pdf_blob, PDO::PARAM_LOB);
                $query->bindValue(":mes_competencia", $_POST['mes']);
                $query->bindValue(":data_geracao", $data);
                $query->execute();
          
                echo '<div class="alert alert-success" role="alert" id="msg">
                        <i class="fa-regular fa-circle-check me-2"></i> Contracheque adicionado com Sucesso!
                    </div>';
            } catch (PDOException $e) {
               

                echo '<div class="alert alert-warning" id="msg" role="alert">
                      <i class="fa-solid fa-triangle-exclamation me-2"></i> Ops! Todos os valores devem ser informados para adicionar um Contracheque, Tente Novamente
                    </div>';
            }
        } else {
            
            echo '<div class="alert alert-danger" role="alert">
                <i class="fa-regular fa-circle-check me-2"></i> Erro no Arquivo, certifique que ?? um arquivo pdf e n??o est?? corrompido!
             </div>';
        }
    }
} else {
 
    echo '<div class="alert alert-warning" id="msg" role="alert">
             <i class="fa-solid fa-triangle-exclamation me-2"></i> Ops! O arquivo do Contracheque n??o foi anexado
           </div>';
}
