<a href="#users"></a>
<div class="col-md-12 tabela mt-2">
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="col-md-12">
                <div class="h-20 p-4 bg-light border rounded-3  me-2 mb-2">
                    <h2><i class="fa-solid fa-list me-4"></i>Lista de Funcionários</h2>
                    <p>Visualize todos os funcionários da farmácia aqui, você pode pesquisar para facilitar sua busca</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item " aria-current="page">Painel</li>
                            <li class="breadcrumb-item active" aria-current="page">Gestão de Funcionários</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-5" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><i class="fa-solid fa-user me-2"></i>Nome</th>
                                <th><i class="fa-solid fa-briefcase me-2"></i>Cargo</th>
                                <th><i class="fa-solid fa-shop me-2"></i>Loja</th>
                                <th><i class="fa-solid fa-gears me-2"></i>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../controllers/FuncionarioController.php';
                            $controllerFuncionario = new FuncionarioController();
                            $controllerFuncionario->listarFuncionario();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="./js/sb-admin-2.min.js"></script>
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="./js/datatables-demo.js"></script>