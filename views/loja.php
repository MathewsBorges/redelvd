<div class="row" id="conteudo-pagina">
    <div class="mt-4 col-md-12 pe-lg-4">
        <div class="h-40 p-5 bg-light border d-flex justify-content-around align-items-center rounded-3 mb-4">
            <h2>Rede LVD - Loja 99</h2>
            <div class="col-md-12 d-flex justify-content-around align-items-center">
                <p><i class="fa-solid fa-location-dot me-2"></i>AV. CAPITÃO ADOLFO CASTRO, 378 - CENTRO - CAMAQUÃ</p>
                <p><i class="fa-solid fa-phone me-2"></i>Fone: (51) 3671-9311 </p>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-5 principal pe-lg-4">
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
                                    <th><i class="fa-solid fa-user me-2"></i>Nome</th>
                                    <th><i class="fa-solid fa-briefcase me-2"></i>Cargo</th>
                                    <th><i class="fa-solid fa-phone me-2"></i>Telefone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../controllers/FuncionarioController.php';
                                $controller =  new FuncionarioController();
                                $controller->listarFuncionarioLoja(99);
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
                        <table class="table table-hover" id="dataTable5" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"><i class="fa-solid fa-user me-2"></i>Funcionário</th>
                                    <th scope="col"><i class="fa-solid fa-file me-2"></i>Arquivo</th>
                                    <th scope="col"><i class="fa-regular fa-calendar-days me-2"></i>Data Emissão</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                require_once 'pdfs/projects.php';
                                Projects::listarContrachequeLoja(99);
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
            <div class="col-md-12 ms-2" id="resultadoArquivos">

            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"><i class="fa-solid fa-file me-2"></i>Arquivo</th>
                                    <th scope="col"><i class="fa-solid fa-clipboard-list me-2"></i>Tipo</th>
                                    <th scope="col"><i class="fa-regular fa-calendar-days me-2"></i>Emissão</th>
                                    <th scope="col"><i class="fa-solid fa-gear me-2"></i>Opções</th>

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
                    <form class="form-arquivos-loja" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 d-flex justify-content-center ms-2 ps-2">
                            <h5><i class="fa-solid fa-upload me-2"></i>Upload de Arquivos</h5>
                            <div class="col-md-10 mb-2">
                                <div class="input-group">
                                    <input type="file" name="pdf_file" class="form-control" id="pdf" aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
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
                            <div class="col-md-12 d-flex justify-content-center align-itens-center mb-4">
                                <input type="hidden" name="farmacia" id="farmacia" value="99">
                                <button class="btn btn-success" type="submit" id="salvar-arquivo"><i class="fa-solid fa-paperclip me-2"></i>Anexar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../assets/js/sb-admin-2.min.js"></script>
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/datatables-demo.js"></script>
<script src="../assets/js/function.js"></script>