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
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />



    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="./js/maskMoney.min.js" type="text/javascript"></script>

    <title>Rede LVD - Gestão de Funcionário</title>

</head>

<body>
    <?php
    require_once '../controllers/FuncionarioController.php';
    require_once '../controllers/AvisoController.php';

    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : $_GET['id'];
    $controller = new FuncionarioController();
    $controllerAviso = new AvisoController();
    $dados = $controller->dadosFuncionario($codigo);
    $cargos  = [1 => "Administrador", 2 => "Gerente", 3 => "Vendedor", 5 => "Motoboy", 7 => "Diretor Geral", 8 => "Auxiliar Administrativo", 10 => "Farmacêutica", "E" => "Entregador", 4 => "Comprador", 11 => "Gerente Folga"];

    ?>

    <header>

        <div class="col-md-12 col-sm-12 cabecalho">

            <div class="img">
                <img class="fa-solid fa-user ms-4 fa-6x" src="" alt="">
            </div>
            <div class="descricao">
                <?php echo '
                                <h2>' . $dados['nome'] . '</h2>
                                 <h4>' . $cargos[$dados['perfil']] . '</h4>
                            ';
                ?>

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



    <div class="container principal overflow-hidden">



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
                            <label for="floatingInput"><i class="fa-solid fa-user me-2"></i>Nome Completo</label>
                            <div class="invalid-feedback">Nome Válido</div>
                            <div class="valid-feedback">Nome Inválido</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="date" name="data" class="form-control" value="<?php echo $dados['data_n'] ?>" id="data" placeholder="Data de Nascimento" required>
                            <label for="floatingInput"><i class="fa-solid fa-calendar-days me-2"></i>Data Nascimento</label>
                            <div class="invalid-feedback">Data Inválida</div>
                            <div class="valid-feedback">Data Válida</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF" value=<?php echo $dados['cpf'] ?> required>
                            <label for="floatingInput"><i class="fa-solid fa-id-card me-2"></i>CPF</label>
                            <div class="invalid-feedback">CPF Inválido</div>
                            <div class="valid-feedback">CPF Válido</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $dados['email'] ?>">
                            <label for="floatingInput"><i class="fa-solid fa-at me-2"></i>Email</label>
                            <div class="invalid-feedback">Email Inválido</div>
                            <div class="valid-feedback">Email Válido</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="telefone" class="form-control" id="telefone" placeholder="(xx) 9xxxx-xxxx" value="<?php echo $dados['telefone'] ?>">
                            <label for="floatingInput"><i class="fa-solid fa-mobile me-2"></i>Telefone</label>
                            <div class="invalid-feedback">Telefone Inválido</div>
                            <div class="valid-feedback">Telefone Válido</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço Completo" value="<?php echo $dados['endereco'] ?>">
                            <label for="floatingInput"><i class="fa-solid fa-location-dot me-2"></i>Endereço</label>
                            <div class="invalid-feedback">Endereço Inválido, Branco ou sem número de Residencia</div>
                            <div class="valid-feedback">Endereço Válido</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="cep" class="form-control" id="cep" placeholder="CEP" value="<?php echo $dados['cep'] ?>">
                            <label for="floatingInput"><i class="fa-solid fa-map-pin me-2"></i>CEP</label>
                            <div class="invalid-feedback">CEP Inválido</div>
                            <div class="valid-feedback">CEP Válido</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select disabled class="form-select" name="loja" id="loja" aria-label="Floating label select example">
                                <?php
                                require_once '../controllers/EmpresaController.php';
                                $empresa = new EmpresaController();
                                $empresa->listarLojas($dados['loja']);
                                ?>

                            </select>
                            <label for="floatingSelect"><i class="fa-solid fa-store me-2"></i>Loja</label>
                            <div class="invalid-feedback">Loja Inválida</div>
                            <div class="valid-feedback">Loja Válida</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input disabled type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" value="Camaquã">
                            <label for="floatingInput"><i class="fa-solid fa-city me-2"></i>Cidade</label>
                            <div class="invalid-feedback">Cidade Inválida</div>
                            <div class="valid-feedback">Cidade Válida</div>
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="form-floating">
                            <select disabled class="form-select" name="classe" id="cargo" aria-label="Floating label select example">
                                <?php
                                require_once '../controllers/EmpresaController.php';
                                $empresa = new EmpresaController();
                                $empresa->listarCargos($dados['perfil']);
                                ?>



                            </select>
                            <label for="floatingSelect"><i class="fa-solid fa-user-tie me-2"></i>Perfil</label>
                            <div class="invalid-feedback">Perfil Inválido</div>
                            <div class="valid-feedback">Perfil Válido</div>
                        </div>
                    </div>

                    <div class="col-md-8 col-xs-2 d-flex mt-4">
                        <button id="editar" class="btn btn-primary me-1"><i class="fa-regular fa-pen-to-square"></i>Editar</button>
                        <button type="submit" class="btn btn-success me-1" id="submit" disabled><i class="fa-regular fa-floppy-disk"></i>Salvar</button>
                        <button type="reset" id="cancelar" class="btn btn-danger me-1" disabled><i class="fa-solid fa-ban"></i>Cancelar</button>
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
                                            <th><i class="fa-regular fa-file me-2"></i>Arquivo</th>
                                            <th><i class="fa-solid fa-file-pen me-2"></i>Tipo</th>
                                            <th><i class="fa-regular fa-calendar-days me-2"></i>Data Emissão</th>
                                            <th><i class="fa-solid fa-gears me-2"></i>Opções</th>
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
                                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-file-circle-plus me-2"></i>Anexar</button>
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

        <div class="row mb-5 card shadow py-4">

            <div class="col-md-12 ms-1 mb-5 px-4 py-4">
                <div class="titulo-card">
                    <h2>Avisos</h2>
                </div>

                <div class="row shadow rounded-3">
                    <div class="titulo-card py-3">
                        <h3>Adicionar Aviso</h3>
                    </div>
                    <div class="col-md-6">
                        <form id="form-aviso" action="../controllers/AvisoController.php" method="post">
                            <input type="hidden" name="method" value="insertAviso">
                            <div class="form-floating mb-4">
                                <textarea class="form-control" name="mensagem" placeholder="Escreva o aviso aqui" id="aviso" style="height: 120px"></textarea>
                                <label for="floatingTextarea2"><i class="fa-solid fa-envelope me-2"></i>Aviso</label>
                                <div class="invalid-feedback">Preencha o Aviso</div>
                                <div class="valid-feedback">Aviso Preenchido</div>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row d-flex align-items-center justify-content-start">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="prioridade" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="NORMAL">Normal</option>
                                        <option value="URGENTE">Urgente</option>
                                        <option value="IMPORTANTE">Importante</option>
                                    </select>
                                    <label for="floatingSelect"><i class="fa-solid fa-signal me-2"></i>Nível de Prioridade</label>
                                </div>

                            </div>
                            <div class="row ms-1  mt-2">
                                <button type="submit" id="submit-aviso" class="btn btn-success"><i class="fa-solid fa-paper-plane me-2"></i>Adicionar</button>
                            </div>

                            <input type="hidden" name="id_funcionario" value="<?php echo $dados['codigo'] ?>">
                            </form>
                        </div>
                    </div>


                </div>


                <div class="row mt-2 mb-2 card shadow py-4">
                    <div class="col-md-12 col-xs-12">
                        <div class="titulo-card">
                            <h3>Avisos do Funcionário</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTableAvisos" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><i class="fa-solid fa-signal me-2"></i>Prioridade</th>
                                            <th><i class="fa-regular fa-calendar-days me-2"></i>Data de Envio</th>
                                            <th><i class="fa-solid fa-user-tie me-2"></i>Remetente</th>
                                            <th><i class="fa-solid fa-gear me-2"></i>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $controllerAviso->listarAvisosTabela($codigo); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row shadow bg-white rounded-3 py-4 px-3">
            <h3>Contracheque do Funcionário</h3>
            <div class="col-md-6">
                <form class="form-arquivos" action="pdfs/enviarCheque.php" method="post" enctype="multipart/form-data">

                    <div class="row g-2">
                        <h4>Créditos</h4>

                        <div class="col-md mb-1">
                            <div class="form-floating">
                                <input type="text" class="form-control money" id="salario" name="salario" placeholder="Salário" value="">
                                <label for="floatingInputGrid"><i class="fa-solid fa-dollar-sign me-2"></i>Salário Mês</label>
                            </div>
                        </div>
                        <div class="col-md mb-1">
                            <div class="form-floating">
                                <input type="text" class="form-control money" id="ferias" name="ferias" placeholder="Férias" value="">
                                <label for="floatingInputGrid"><i class="fa-solid fa-gift me-2"></i>Férias</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md mb-1">
                            <div class="form-floating">
                                <input type="text" class="form-control money" id="outros" name="outros" placeholder="Outros" value="">
                                <label for="floatingInputGrid"><i class="fa-solid fa-receipt me-2"></i>Outros</label>
                            </div>
                        </div>
                        <div class="col-md mb-1">
                            <div class="form-floating">
                                <input type="text" class="form-control moneyTotal" id="total_creditos" name="total_creditos" placeholder="Total" value="">
                                <label for="floatingInputGrid"><i class="fa-solid fa-sack-dollar me-2"></i>Total de Créditos</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <h4>Débitos</h4>
                        <div class="col-md mb-1">
                            <div class="form-floating">
                                <input type="text" class="form-control moneyDeb" id="moneydeb" name="convenio" placeholder="Convênio" value="">
                                <label for="floatingInputGrid"><i class="fa-regular fa-credit-card me-2"></i>Convênio Farmácia</label>
                            </div>
                        </div>
                        <div class="col-md mb-1">
                            <div class="form-floating">
                                <input type="text" class="form-control moneyDeb" id="moneydeb" name="vales" placeholder="Vales" value="">
                                <label for="floatingInputGrid"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Vales</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md mb-1">
                            <div class="form-floating">
                                <input type="text" class="form-control moneyDeb" id="moneydeb" name="emprestimos" placeholder="Empréstimos" value="">
                                <label for="floatingInputGrid"><i class="fa-solid fa-hand-holding-dollar me-2"></i>Empréstimos</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="total_debitos" name="total_debitos" placeholder="Total de Débitos" value="">
                                <label for="floatingInputGrid"> <i class="fa-solid fa-cash-register me-2"></i>Total de Débitos</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md">
                        <h4>Total</h4>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="total" name="total_receber" placeholder="Total a Receber" value="">
                            <label for="floatingInputGrid"><i class="fa-solid fa-coins me-2"></i>Total a Receber</label>
                        </div>
                    </div>
                    <hr>
                    <div class="input-arquivos mt-2">
                        <h4>Upload de Contracheque</h4>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="file" name="pdf" class="form-control" id="pdf" aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mt-1">
                                    <label class="input-group-text" for="inputGroupSelect01">Mês de Competência</label>
                                    <select class="form-select" name="mes" id="inputGroupSelect01">
                                        <option value="Janeiro" selected>Janeiro</option>
                                        <option value="Fevereiro">Fevereiro</option>
                                        <option value="Março">Março</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Maio">Maio</option>
                                        <option value="Junho">Junho</option>
                                        <option value="Julho">Julho</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Setembro">Setembro</option>
                                        <option value="Outubro">Outubro</option>
                                        <option value="Novembro">Novembro</option>
                                        <option value="Dezembro">Dezembro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 d-flex justify-content-center mt-4 mb-5">
                                <input type="hidden" name="codigo" value="<?php echo $dados['codigo'] ?>">
                                <button type="submit" class="btn btn-success"> <i class="fa-solid fa-file-circle-plus me-2"></i>Adicionar Contracheque</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 mt-2">
            <div class="col-md-12 ms-2 mt-4 shadow  py-4 px-2 rounded-3">
                <div class="row">
                    <div class="titulo-card">
                        <h4>Últimos Contracheques</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataContracheques" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Data de Emissão</th>
                                        <th>Mês de Competência</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    require_once 'pdfs/projects.php';
                                    Projects::listarContracheque(266)
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Apagar Contracheque</h5>
                    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja apagar o contracheque? Lembre-se, não será possível recuperalo após isso e o funcionário não terá mais acesso</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Apagar</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <span class="text-white">
            © Copyright 2023 <strong class='ms-2 text-success'>Rede LVD</strong>
        </span>
    </footer>


    <script src="js/crud.js"></script>
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