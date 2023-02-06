<div class="row">
    <?php

    ?>
    <div class="col-md-12">
        <div class="h-40 p-5 bg-light border rounded-3 mb-4">
            <h2>Rede LVD - Loja 02</h2>
        </div>
    </div>
    <div class="col-md-12 mb-5 principal">


    


            <div class="col-md-12 mb-5 card shadow">
                <div class="titulo-card mt-3">
                    <h3><i class="fa-solid fa-users me-2"></i>Funcionários da Farmácia</h3>

                </div>
                <div class="card mb-1">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable2" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Cargo</th>
                                        <th>Telefone</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    require_once '../controllers/FuncionarioController.php';
                                    $controller =  new FuncionarioController();
                                    $controller->listarFuncionarioLoja(2);

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12 mt-5 mb-5  card shadow">
                <div class="titulo-card mt-3">
                    <h3><i class="fa-regular fa-file me-2"></i>Contra-cheque de Funcionários</h3>

                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable3" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Funcionário</th>
                                        <th>Arquivo</th>
                                        <th>Data Emissão</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Teste</td>
                                        <td>arquivo.pdf</td>
                                        <td>27/01/2023</td>
                                        <td>
                                            <button class="btn btn-primary">Visualizar</button>
                                        </td>

                                    </tr>

                                    <?php


                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12   mb-5 card shadow">
                <div class="titulo-card mt-3">
                    <h3><i class="fa-regular fa-folder-open me-2"></i>Arquivos da Farmácia</h3>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Código</th>
                                        <th scope="col" sortable="name">Nome do Arquivo</th>
                                        <th scope="col" sortable="area">Tipo</th>
                                        <th scope="col" sortable="population">Emissão</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'pdfs/projects.php';
                                    Projects::listarDocumentosFarmacia(2);


                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-md-12">

                        <form class="form-arquivos-loja" action="pdfs/enviarfarmacias.php" method="post" enctype="multipart/form-data">
                            <div class="col-md-6 d-flex justify-content-center ms-2 ps-2">
                                <h5><i class="fa-solid fa-upload me-2"></i>Upload de Arquivos</h5>
                                <div class="col-md-10 mb-2">
                                    <div class="input-group">
                                        <input type="file" name="pdf_file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                                    </div>
                                </div>
                                <div class="col-md-6 ms-2">
                                    <div class="input-group mb-3 tipo">

                                        <label class="input-group-text" for="inputGroupSelect01">Tipo de Arquivo</label>
                                        <select class="form-select" name="tipo" id="inputGroupSelect01">
                                            <option value="Documento de Fiscalização" selected>Documento de Fiscalização</option>
                                            <option value="Alvará">Alvará</option>
                                            <option value="Outros">Outros</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 botao-anexar d-flex justify-content-center align-itens-center mb-4">
                                    <input type="submit" value="Anexar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>





            </div>





            </form>
        </div>




    







</div>


<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="./js/sb-admin-2.min.js"></script>
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="./js/datatables-demo.js"></script>