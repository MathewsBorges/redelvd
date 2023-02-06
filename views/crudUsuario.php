<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7073a72774.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/vendor/css/crudUsuario.css">


    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />



    <title>Funcionário</title>
</head>

<body>

    <?php
    require_once '../controllers/FuncionarioController.php';
    require_once '../controllers/AvisoController.php';

    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : $_GET['id'];
    $controller = new FuncionarioController();
    $controllerAviso = new AvisoController();
    $dados = $controller->dadosFuncionario($codigo);
    $cargos  = ["G" => "Gerente", "V" => "Vendedor", "T" => "Farmaceutica", "S" => "Supervisor", "A" => "Auxiliar Admnistrativo", "X" => "X", "U" => "U", "E" => "Entregador", "F" => "Financeiro"];

    ?>

    <header>

        <div class=" col-md-12 cabecalho">

            <div class="img">
                <img src="../assets/img/user.png" alt="erro">
            </div>
            <div class="descricao">
                <?php echo '
            <h2>' . $dados['nome'] . '</h2>
            <h4>' . $cargos[$dados['classe']] . '</h4>
            '; ?>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item  active" aria-current="page"><a href="painel.php">Painel</a></li>
                        <li class="breadcrumb-item">Gestão de Funcionários - <?php echo $dados['nome'] ?></li>

                    </ol>
                </nav>
            </div>
        </div>
    </header>

    <div class="col-md-12">
        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'deleted') {
                echo '
            <div class="alert alert-success" role="alert" id="msg-success">
            <i class="fa-solid fa-check" style="color: green"></i>

                     Aviso do Funcionário apagada com Sucesso
            </div>';
            }

            if ($_GET['status'] == 'deletedFailed') {
                echo '
            <div class="alert alert-danger" role="alert" id="msg-success">
            <i class="fa-solid fa-circle-exclamation" style="color: red"></i>

             Ops! Não foi possível apagar o aviso do Funcionário

          </div>
         
            ';
            }

            if (isset($_GET['status'])) {
                if ($_GET['status'] == "enviado") {
                    echo '
                    <div class="alert alert-success" role="alert" id="msg-success">
                    <i class="fa-solid fa-check"></i>
                       Aviso Enviado Com Sucesso
                  </div>
                    ';
                }
            }

            if (isset($_GET['status'])) {
                if ($_GET['status'] == "fileUploaded") {
                    echo '
                    <div class="alert alert-success" role="alert" id="msg-success">
                    <i class="fa-solid fa-check"></i>
                       Documento Anexado com Sucesso
                  </div>
                    ';
                }
            }

            if (isset($_GET['status'])) {
                if ($_GET['status'] == "fileError") {
                    echo '
                    <div class="alert alert-danger" role="alert" id="msg-success">
                        <i class="fa-solid fa-circle-exclamation" style="color: red"></i>
                        Ops! Ocorreu um erro ao anexar o arquivo, certifique que o arquivo é um arquivo PDF
                    </div>
                    ';
                }
            }

            if (isset($_GET['status'])) {
                if ($_GET['status'] == "fileDeleted") {
                    echo '
                    <div class="alert alert-success" role="alert" id="msg-success">
                    <i class="fa-solid fa-check"></i>
                       Arquivo deletado com sucesso
                    </div>
                    ';
                }
            }
            if (isset($_GET['status'])) {
                if ($_GET['status'] == "fileDeletedError") {
                    echo '
                    <div class="alert alert-danger" role="alert" id="msg-success">
                        <i class="fa-solid fa-circle-exclamation" style="color: red"></i>
                        Ops! Ocorreu um erro ao deletar o Arquivo do Funcionario
                    </div>
                    ';
                }
            }
        }
        ?>
    </div>



    <div class="container principal">



        <div class="row formulario mb-2 card shadow py-5 pe-4">
            <div class="titulo-card col-md-12">
                <h2>Dados do Funcionário</h2>

                <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == "success") {
                        echo '
   
                    <div class="alert alert-success" role="alert"  id="msg-success">
                      <i class="fa-solid fa-check"></i>
                         Funcionário Editado com Sucesso
                    </div>
                 ';
                    }

                    if ($_GET['status'] == "failed") {

                        echo '
        
                            <div class="alert alert-danger" role="alert" id="msg-success">
                                 <i class="fa-solid fa-cancel"></i>
                                    Erro ao editar funcionário
                            </div>
                          ';
                    }
                }



                ?>


            </div>

            <div class="container mt-2">
                <form class="row g-3" id="form" action="../controllers/FuncionarioController.php" method="post">
                    <input type="hidden" name="method" value="editarFuncionario">
                    <input type="hidden" name="id" value="<?php echo $dados['codigo'] ?>">
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="nome" class="form-control" id="nome" placeholder="Nome Completo" value="<?php echo $dados['nome'] ?>" required>
                            <label for="floatingInput">Nome Completo</label>
                            <div class="invalid-feedback">Nome Válido</div>
                            <div class="valid-feedback">Nome Inválido</div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="date" name="data" class="form-control" value="<?php echo $dados['data_n'] ?>" id="data" placeholder="Data de Nascimento" required>
                            <label for="floatingInput">Data Nascimento</label>
                            <div class="invalid-feedback">Data Inválida</div>
                            <div class="valid-feedback">Data Válida</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF" value=<?php echo $dados['cpf'] ?> required>
                            <label for="floatingInput">CPF</label>
                            <div class="invalid-feedback">CPF Inválido</div>
                            <div class="valid-feedback">CPF Válido</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $dados['email'] ?>">
                            <label for="floatingInput">Email</label>
                            <div class="invalid-feedback">Email Inválido</div>
                            <div class="valid-feedback">Email Válido</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="telefone" class="form-control" id="telefone" placeholder="(xx) 9xxxx-xxxx" value="<?php echo $dados['telefone'] ?>">
                            <label for="floatingInput">Telefone</label>
                            <div class="invalid-feedback">Telefone Inválido</div>
                            <div class="valid-feedback">Telefone Válido</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço Completo" value="<?php echo $dados['endereco'] ?>">
                            <label for="floatingInput">Endereço</label>
                            <div class="invalid-feedback">Endereço Inválido, Branco ou sem número de Residencia</div>
                            <div class="valid-feedback">Endereço Válido</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="cep" class="form-control" id="cep" placeholder="CEP" value="<?php echo $dados['cep'] ?>">
                            <label for="floatingInput">CEP</label>
                            <div class="invalid-feedback">CEP Inválido</div>
                            <div class="valid-feedback">CEP Válido</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select disabled class="form-select" name="loja" id="loja" aria-label="Floating label select example">
                                <option selected value="1">Loja 01 - Matriz</option>
                                <option value="2">Rede LVD - Loja 02</option>
                                <option value="3">Rede LVD - Loja 03</option>
                                <option value="4">Rede LVD - Loja 04</option>
                                <option value="5">Rede LVD - Loja 05</option>

                            </select>
                            <label for="floatingSelect">Loja</label>
                            <div class="invalid-feedback">Loja Inválida</div>
                            <div class="valid-feedback">Loja Válida</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" value="Camaquã">
                            <label for="floatingInput">Cidade</label>
                            <div class="invalid-feedback">Cidade Inválida</div>
                            <div class="valid-feedback">Cidade Válida</div>
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="form-floating">
                            <select disabled class="form-select" name="classe" id="cargo" aria-label="Floating label select example">
                                <option selected value="V">Vendedor</option>
                                <option value="A">Administrador</option>
                                <option value="A">Auxiliar Administrativo</option>
                                <option value="S">Supervisor</option>
                                <option value="E">Entregador</option>
                                <option value="T">Farmacêutico</option>
                            </select>
                            <label for="floatingSelect">Classe</label>
                            <div class="invalid-feedback">Cargo Inválido</div>
                            <div class="valid-feedback">Cargo Válida</div>
                        </div>
                    </div>

                    <div class=" buttons col-md-8 mt-4">
                        <button id="editar" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>Editar</button>
                        <button type="submit" class="btn btn-success" id="submit" disabled><i class="fa-regular fa-floppy-disk"></i>Salvar</button>
                        <button type="reset" id="cancelar" class="btn btn-danger" disabled><i class="fa-solid fa-ban"></i>Cancelar</button>
                    </div>











                </form>
            </div>
        </div>

        <div class="row mb-5 card shadow py-4">
            <div class="titulo-card">
                <h2>Arquivos do Funcionário</h2>
            </div>
            <div class="arquivos col-md-12">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTableArquivos" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Arquivo</th>
                                            <th>Tipo</th>
                                            <th>Data Emissão</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'pdfs/projects.php';
                                        Projects::listarDocumentos($dados['codigo']) ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-arquivos">

                            <form class="form-arquivos" action="pdfs/enviar.php" method="post" enctype="multipart/form-data">
                                <div class="col d-flex arquivos-funcionarios">

                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="pdf_file" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3 tipo">

                                            <label class="input-group-text" for="inputGroupSelect01">Tipo de Arquivo</label>
                                            <select class="form-select" name="tipo" id="inputGroupSelect01">
                                                <option value="Folha de Pagamento" selected>Folha de Pagamento</option>
                                                <option value="Folha Ponto">Folha Ponto</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="botao-anexar">
                                        <span> <i class="fa-solid fa-paperclip"></i></span>
                                        <input type="submit" value="Anexar">
                                        <input type="hidden" name="codigo" value="<?php echo $dados['codigo'] ?>">
                                        <input type="hidden" name="crud" value="crud">

                                    </div>

                                </div>




                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-5">


            <div class="col-md-5 mb-5 me-1 card shadow py-4">
                <div class="titulo-card col-md-12">
                    <h2>Adicionar Aviso</h2>
                </div>
                <form id="form-aviso" action="../controllers/AvisoController.php" method="post">
                    <input type="hidden" name="method" value="insertAviso">
                    <div class="form-floating mb-4">
                        <textarea class="form-control" name="mensagem" placeholder="Leave a comment here" id="aviso" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Aviso</label>
                        <div class="invalid-feedback">Preencha o Aviso</div>
                        <div class="valid-feedback">Aviso Preenchido</div>
                    </div>
                    <div class="row d-flex align-items-center justify-content-start">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" name="prioridade" id="floatingSelect" aria-label="Floating label select example">
                                    <option value="NORMAL">Normal</option>
                                    <option value="URGENTE">Urgente</option>
                                    <option value="IMPORTANTE">Importante</option>
                                </select>
                                <label for="floatingSelect">Nível de Prioridade</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="submit-aviso" class="btn btn-success">Adicionar</button>
                        </div>

                        <input type="hidden" name="id_funcionario" value="<?php echo $dados['codigo'] ?>">
                </form>
            </div>

        </div>






        <div class="col-md-6 ms-1 card shadow py-4">
            <div class="row">
                <div class="titulo-card">
                    <h2>Avisos do Funcionário</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTableAvisos" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Prioridade</th>
                                    <th>Data de Envio</th>
                                    <th>Remetente</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $controllerAviso->listarAvisosTabela($codigo); ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <footer class="footer">
        <span class="text-white">
            ©Copyright 2023 <strong class='ms-2 text-success'>Rede LVD</strong>
        </span>
    </footer>


    <script>
        function removeMensagem() {
            setTimeout(function() {
                var msg = document.getElementById("msg-success");
                msg.parentNode.removeChild(msg);
            }, 3000);
        }
        document.onreadystatechange = () => {
            if (document.readyState === 'complete') {
                removeMensagem();
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


    <script src="./js/validator.js"></script>

    <script type="text/javascript">
        $('#telefone').mask('(00) 0000-00000');
        $('#cep').mask('00000-000');
        $('#cpf').mask('000.000.000-00');
    </script>

    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="./js/sb-admin-2.min.js"></script>
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="./js/datatables-demo.js"></script>




</body>


</html>