<link rel="stylesheet" href="../assets/vendor/css/painel.css">
<div class="col-md-12 mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="h-20 p-4 bg-light border rounded-3">
                    <h2><i class="fa-regular fa-file me-4"></i>Contracheques</h2>
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
    <div class="col-md-12 mt-2">
        <div class="row">
            <div class="col-md-12 card shadow py-4 rounded-3">
                <div class="row">
                    <div class="col-md-6 nome">
                        <p>Nome: Matheus Neugebauer Borges</p>
                    </div>
                    <div class="col-md-4 data ms-2">
                        <p>Mês de Competência: Janeiro</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><i class="fa-solid fa-sack-dollar me-2"></i>Créditos</th>
                                    <th><i class="fa-regular fa-rectangle-list me-2"></i>Descrição</th>
                                    <th><i class="fa-solid fa-dollar-sign me-2"></i>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="fa-solid fa-dollar-sign me-2"></i>Salário Mês</th>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fa-solid fa-gift me-2"></i>Férias</th>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fa-solid fa-receipt me-2"></i>Outros</th>
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
                                    <th><i class="fa-solid fa-cash-register me-2"></i>Débitos</th>
                                    <th><i class="fa-regular fa-rectangle-list me-2"></i>Descrição</th>
                                    <th><i class="fa-solid fa-dollar-sign me-2"></i>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="fa-regular fa-credit-card me-2"></i>Convênio Farmácia</th>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Vales</th>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fa-solid fa-hand-holding-dollar me-2"></i>Empréstimos</th>
                                </tr>
                                <tr>
                                    <th scope="row">Total</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ms-2 col-md-12">
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

    <div class="col-md-12 card rounded-3 py-5 mt-5 mb-5">
        <h3 class="ms-4">Último Contracheque</h3>
        <hr>
        <div class="col-md-12 ms-4 cheque">
            <div class="arquivo">
                <p>Arquivo: </p>
                <p><a href="http://">Arquivo.pdf</a></p>
            </div>
            <div class="mes">
                <p>Mês de Competência: </p>
                <p>Janeiro</p>
            </div>
        </div>
        <hr>
    </div>

    <div class="card shadow col-md-12">
        <hr>
        <h4 class="ms-4">Todos os Contracheques</h4>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-borderless" id="dataCheques" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Mês de Competência</th>
                            <th>Emissão do Documento</th>
                            <th>Resumo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../controllers/ChequeController.php';
                        $cheque = new ChequeController();
                        $cheque->listarContracheque(266);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="../assets/endor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="./js/sb-admin-2.min.js"></script>
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="./js/datatables-demo.js"></script>