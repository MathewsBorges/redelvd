<a href="#users"></a>
<div class="col-md-12 tabela">
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="col-md-12">
                <div class="h-40 p-5 bg-light border rounded-3">
                    <a id="crud"></a>
                    <h2><i class="fa-solid fa-list-ul"></i>Lista de Funcionários</h2>
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
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Cargo</th>
                                <th>Loja</th>
                                <th>Opções</th>
                            </tr>
                        </thead>

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