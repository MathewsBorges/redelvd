<link rel="stylesheet" href="../assets/vendor/css/core.css">
<div class="row">
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
        <h6 class="border-bottom border-gray pb-2 mb-0">Avisos</h6>
        <!-- <div class="media text-muted pt-3 border-bottom border-gray">
            <span class="badge bg-success me-5">Normal</span>

            <p class="media-body pb-3 mb-0 small lh-125 ">
                <strong class="d-block text-gray-dark">@usuario</strong>
                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus.

            </p>
            <div class="d-flex justify-content-between">
                <p class="me-5">Data de Envio: 23/10/2021</p>
                <button type="button" class="btn"> <i class="fa-solid fa-trash"></i> </button>
            </div>
        </div> -->
        <?php
        require_once '../controllers/AvisoController.php';
        $controller = new AvisoController();
        $controller->listarAvisos(266);
        ?>
        <nav aria-label="Page navigation example" class="mt-5 float-end">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#"><</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">></a></li>
            </ul>
        </nav>
    </div>
</div>