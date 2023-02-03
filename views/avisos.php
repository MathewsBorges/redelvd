<div class="row">
    <div class="col-md-12 mb-5">
        <div class=" h-55 p-4 bg-light border rounded-3">
            <div class="titulo-documentos">
                <i class="fa-solid fa-bell fa-2x"></i>
                <h2>Meus Avisos</h2>
            </div>
            <p class="subtitulo-documentos">Mensagem de Administradores e Auxiliares Administrativos</p>

        </div>

    </div>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
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
        $controller->listarAvisos(1);
        ?>
        <nav aria-label="Page navigation example" class="mt-5 float-end">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">
                        <</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">></a></li>
            </ul>
        </nav>

    </div>
</div>