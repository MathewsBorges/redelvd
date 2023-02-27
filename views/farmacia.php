<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/7073a72774.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../assets/css/demo.css" />
<link rel="stylesheet" href="../assets/vendor/css/painel.css">
<link rel="stylesheet" href="../assets/vendor/css/farmacia.css">
<link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
<title>Rede LVD - Farmácia <?php echo $_POST['farmacia'] ?></title>



<div class="row">
    <?php
    $farmacia = $_POST['farmacia'];
    $lojas = [1 => "Matriz", 2 => "Loja 02", 3 => "Loja 03", 4 => "Loja 04", 5 => "Loja 05", 6 => "Loja 06", 7 => "Loja 07", 8 => "Loja 08", 9 => "Loja 09", 10 => "Loja 10", 11 => "Loja 11", 12 => "Loja 12", 13 => "Loja 13", 14 => "Loja 14", 15 => "Loja 15",  16 => "Loja 16", 17 => "Loja 17", 18 => "Loja 18", 99 => "Depósito"];

    ?>
    <div class="col-md-12">
        <div class="h-40 p-5 bg-light border rounded-3 mb-4">
            <h2>Rede LVD - <?php echo $lojas[$farmacia] ?></h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="painel.php">Painel</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Rede LVD - <?php echo $lojas[$farmacia] ?></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="col-md-12 mb-5 principal">
        <div class="container-fluid d-flex">
            <div class="col-12 ms-4 card shadow py-4">
                <div class="titulo-card mt-2">
                    <h3><i class="ms-2 me-2 fa-regular fa-folder-open"></i>Arquivos da Farmácia</h3>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col"><i class="fa-solid fa-file me-2"></i>Arquivo</th>
                                        <th scope="col"><i class="fa-solid fa-clipboard-list me-2"></i>Tipo de Arquivo</th>
                                        <th scope="col"><i class="fa-regular fa-calendar-days me-2"></i>Data de Emissão</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'pdfs/projects.php';
                                    Projects::listarDocumentosFarmacia($farmacia);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form class="form-arquivos-loja"  method="post" enctype="multipart/form-data">
                        <div class="col-md-12 ps-2">
                            <h5><i class="ms-2 me-2 fa-solid fa-upload"></i>Upload de Arquivos</h5>
                            <div class="col-md-12 pe-2 mb-2">
                                <div class="col-md-12 ms-2" id="resultadoArquivos"></div>
                                <div class="input-group">
                                    <input type="file" name="pdf" class="form-control" id="pdf" aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                                </div>
                            </div>
                            <div class="col-md-12 pe-2">
                                <div class="input-group mb-3 tipo">
                                    <label class="input-group-text" for="inputGroupSelect01">Tipo de Arquivo</label>
                                    <select class="form-select" name="tipo" id="inputGroupSelect01">
                                        <option value="Documento de Fiscalização" selected>Documento de Fiscalização</option>
                                        <option value="Alvará">Alvará</option>
                                        <option value="Outros">Outros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mb-4">
                                <input type="hidden" id="farmacia" value="<?php echo $farmacia?>">
                                <button id="salvar-arquivo" class="btn btn-success" type="submit"><i class="fa-solid fa-paperclip me-2"></i>Anexar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-12 ms-4 mt-2 card shadow py-4">
                <div class="titulo-card mt-2">
                    <h3><i class="ms-2 me-2 fa-solid fa-users"></i>Funcionários da Farmácia</h3>
                </div>
                <div class="card mb-1">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable2" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><i class="fa-solid fa-user me-2"></i>Nome</th>
                                        <th><i class="fa-solid fa-briefcase me-2"></i>Cargo</th>
                                        <th><i class="fa-solid fa-phone me-2"></i>Telefone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../controllers/FuncionarioController.php';
                                    $controller =  new FuncionarioController();
                                    $controller->listarFuncionarioLoja($farmacia);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="col-12 ms-4 mt-2 card shadow py-4">
                <div class="titulo-card mt-2">
                    <h3><i class="ms-2 me-2 fa-regular fa-file"></i>Contracheque de Funcionários</h3>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable3" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><i class="fa-solid fa-hashtag me-2"></i>Código</th>
                                        <th><i class="fa-solid fa-user me-2"></i>Funcionário</th>
                                        <th><i class="fa-solid fa-file me-2"></i>Arquivo</th>
                                        <th><i class="fa-regular fa-calendar-days me-2"></i>Data Emissão</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Teste</td>
                                        <td>arquivo.pdf</td>
                                        <td>27/01/2023</td>
                                    </tr>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>




    </div>



    <footer class="footer">
        <span style="color:black">
            ©Copyright 2023 <strong class='ms-2 text-success'>Rede LVD</strong>
        </span>
    </footer>



</div>


<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../assets/js/sb-admin-2.min.js"></script>
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/datatables-demo.js"></script>
<script src="../assets/js/function.js"></script>
