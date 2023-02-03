<link rel="stylesheet" href="../assets/vendor/css/painel.css">
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="col-md-12">
                <div class="h-40 p-5 bg-light border rounded-3">
                    <a id="crud"></a>
                    <h2><i class="fa-regular fa-file"></i>Contracheques</h2>
                    <p>Visualize aqui seus Contracheques</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item " aria-current="page">Painel</li>
                            <li class="breadcrumb-item active" aria-current="page">Contracheques</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="row mb-5">
            <div class="col-md-10 col-info">
                <div class="nome">
                    <p>Nome: </p>
                    <p> NOME DO FUNCIONÁRIO EXEMPLO</p>

                </div>
                <div class="data">
                    <p>Mês de Competência: </p>
                    <p>Janeiro</p>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Créditos</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Salário Mês</th>
                                </tr>
                                <tr>
                                    <th scope="row">Férias</th>

                                </tr>
                                <tr>
                                    <th scope="row">Outros</th>

                                </tr>
                                <tr>
                                    <th scope="row">Total</th>

                                </tr>

                            </tbody>
                        </table>
                    </div>



                    <div class="col-md-6">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Créditos</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row">Salário Mês</th>
                                </tr>
                                <tr>
                                    <th scope="row">Férias</th>

                                </tr>
                                <tr>
                                    <th scope="row">Outros</th>

                                </tr>
                                <tr>
                                    <th scope="row">Total</th>

                                </tr>

                            </tbody>

                        </table>
                    </div>

                    <div class="ms-4 col-md-12">
                        <div class="input-group input-group-lg">

                            <span class="valor-span" id="">Total a Receber:</span>

                            <div class="col-md-10 valor">
                                <p>R$ 3858,52</p>
                            </div>
                        </div>

                    </div>


                </div>


            </div>
        </div>

    </div>

    <div class="col-md-12 mt-5 mb-5">
        <hr>
        <h3>Último Contracheque</h3>
        <div class="col-md-12 ms-2 cheque">
            <div class="arquivo">
                <p>Arquivo: </p>
                <p><a href="http://">Arquivo.pdf</a></p>
            </div>
            <div class="mes">
                <p>Mês de Competência: </p>
                <p>Janeiro</p>
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <hr>
        <h4>Todos os Contracheques</h4>
      
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-borderless" id="dataCheques" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Mês de Competência</th>
                            <th>Emissão do Documento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Arquivo.pdf</td>
                            <td>JANEIRO</td>
                            <td>03/02/2023</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="./js/sb-admin-2.min.js"></script>
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="./js/datatables-demo.js"></script>