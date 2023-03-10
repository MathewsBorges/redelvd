<link rel="stylesheet" href="../assets/vendor/css/core.css">
<div class="row" id="conteudo-pagina">
    <div class="col-md-12 mt-2">
        <div class="col-md-12">
            <div class="h-20 p-4 bg-light border rounded-3  me-2">
                <h2><i class="fa-regular fa-bell me-4"></i>Meus Avisos</h2>
                <p>Mensagem de Administradores e Auxiliares Administrativos você encontra aqui</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item " aria-current="page">Painel</li>
                        <li class="breadcrumb-item active" aria-current="page">Avisos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="my-1 p-3 bg-white rounded shadow-sm">
        <h4 class="border-bottom border-gray pb-2 mb-2">Meus Avisos</h4>
        <div class="col-md-12" id="resultadoAvisos"></div>
        <table class="table table-hover mb-2" id="tabelaAvisosFuncionario" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><i class="fa-regular fa-file me-2"></i>Aviso</th>
                    <th hidden>Prioridade</th>

                </tr>
            </thead>
            <tbody>

                <?php
                require_once '../controllers/AvisoController.php';
                $controller = new AvisoController();
                $controller->tabelaAviso(266);
                ?>

            </tbody>
        </table>

        <!-- <nav aria-label="Page navigation example" class="mt-5 float-end">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">
                        << /a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">></a></li>
            </ul>
        </nav> -->
    </div>
</div>
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/datatables-demo.js"></script>
<script src="../assets/js/sb-admin-2.min.js"></script>
<!-- <script src="../assets/js/crud.js"></script> -->
<script src="../assets/js/function.js"></script>