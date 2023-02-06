<div class="row mt-2">
    <div class="col-md-12 mb-2">
        <div class=" h-55 p-4 bg-light border rounded-3">
            <div class="titulo-documentos">
                <i class="fa-solid fa-folder-open fa-2x me-2"></i>
                <h2>Meus Documentos</h2>
            </div>
            <p class="subtitulo-documentos">Anexar Arquivos, Visualizar, Baixar Arquivos de RH</p>

        </div>

    </div>

    <div class="row mt-5">
        <div class="col-md-12 card shadow mb-4 pt-4">
            <div class="col-md-12">
                <div class="titulo-card">
                    <h4><i class="fa-solid fa-user me-2"></i>Meus Documentos Anexados</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataMeusDocumentos" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Tipo do Documento</th>
                                    <th>Emissão do Documento</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../controllers/FuncionarioController.php';
                                require_once '../views/pdfs/projects.php';
                                Projects::listarDocumentos(1);
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                <hr />
                <div class="input-arquivos">
                    <h5><i class="fa-solid fa-upload me-2"></i>Upload de Arquivos</h5>

                    <form class="form-arquivos" action="pdfs/enviar.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 d-flex">

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" name="pdf_file" class="form-control" id="pdf" aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3 tipo">

                                    <label class="input-group-text ms-2" for="inputGroupSelect01">Tipo de Arquivo</label>
                                    <select class="form-select" name="tipo" id="inputGroupSelect01">
                                        <option value="Atestado Médico" selected>Atestado Médico</option>
                                        <option value="Folha Ponto">Folha Ponto</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 ms-2  button-anexar">

                                <input type="submit" class="btn btn-success" value="Anexar">

                            </div>
                        </div>





                    </form>


                </div>

            </div>
            <hr />


        </div>

    </div>

    <div class="row mt-5">
        <div class="col-md-12 ">
            <div class="col-md-12 card shadow mb-4 pt-4">

                <div class="titulo-card">
                    <h4><i class="fa-regular fa-file me-2"></i>Documentos RH</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataDocumentos" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Tipo do Documento</th>
                                    <th>Emissão do Documento</th>
                                    <th>Remetente</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../controllers/FuncionarioController.php';
                                require_once '../views/pdfs/projects.php';
                                Projects::listarDocumentosRh();


                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="./js/datatables-demo.js"></script>
<script src="./js/sb-admin-2.min.js"></script>