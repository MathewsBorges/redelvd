<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Painel - Rede LVD</title>

  <meta name="description" content="" />


  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/7073a72774.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />



  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css">


  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <link rel="stylesheet" href="../assets/vendor/css/painel.css">

  <script src="../assets/vendor/js/helpers.js"></script>


  <script src="../assets/js/config.js"></script>
</head>

<body>

  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">


      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="painel.php" class="app-brand-link">
            <img src="../assets/img/logo.png" alt="">

          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">

          <li class="menu-item">
            <a href="documentos.php" class="menu-link">
              <i class="fa-regular fa-file me-2"></i>
              Meus Documentos
            </a>
          </li>
          <li class="menu-item ">
            <a href="cheques.php" class="menu-link">
              <i class="fa-solid fa-file-invoice me-2"></i>
              Contracheques
            </a>
          </li>
          <li class="menu-item ">
            <a href="farmacias.php" class="menu-link">
              <i class="fa-solid fa-shop me-2"></i>
              Farmácias
            </a>
          </li>
          <li class="menu-item ">
            <a href="loja.php" class="menu-link">
              <i class="fa-solid fa-server me-2"></i>
              Dados da Farmácia
            </a>
          </li>
          <li class="menu-item ">
            <a href="crud.php" class="menu-link">
              <i class="fa-solid fa-users me-2"></i>
              Gestão de Funcionários
            </a>
          </li>






        </ul>
        <li class="menu-item sair">
          <a href="../index.php" class="menu-link">
            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
            Sair
          </a>
        </li>
      </aside>

      <div class="layout-page">


        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

            <div class="navbar-nav align-items-center ">
              <div class="nav-item d-flex align-items-center pt-2">
                <h2 class="me-5">Nome: Funcionário</h2>
                <h2 class="ms-5">Cargo Funcionário</h2>
              </div>
            </div>


        </nav>
        <div class="row">
          <div class="col-md-12" id="conteudo" style="width:100%">

            <div class="titulo">

              <div class="texto-principal">
                <h1>REDE LVD</h1>
              </div>
              <div class="texto-secundario">
                <p>Aqui você tem amigos</p>
              </div>

            </div>

          </div>
        </div>


      </div>

    </div>




    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <footer class="footer">
    <span style="color:black">
      ©Copyright 2023 <strong class='ms-2 text-success'>Rede LVD</strong>
    </span>
  </footer>

  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>



  <script src="../assets/js/main.js"></script>


</body>

<script>
  $(".menu-inner  a").click(function(e) {
    e.preventDefault();

    $(".menu-inner li").each(function(index, elemente) {
       $(elemente).removeClass('active');
    })

    $(this).parent().addClass('active');
    var href = $(this).attr('href');
    $("#conteudo").load(href);
  });
</script>

</html>