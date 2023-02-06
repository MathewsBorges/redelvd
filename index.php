<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/7073a72774.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/vendor/css/login.css">


    <title>ÁREA FUNCIONÁRIO - LOGIN</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
                <span class="company__logo">
                    <img src="assets/img/logo-lvd.png" alt="">

                </span>

            </div>

        
            <div class="col-md-8 col-xs-12 col-sm-12 login_form">

                <div class="container-fluid">
                    <div class="row">
                        <h2>Login</h2>
                    </div>
                    <div class="row">
                        <form control="" action="views/painel.php" class="form-group" method="post">
                            <div class="row">
                                <input type="text" name="username" id="username" class="form__input" placeholder="CPF">
                            </div>
                            <div class="row">

                                <input type="password" name="password" id="password" class="form__input"
                                    placeholder="Senha">
                            </div>

                            <div class="row">
                                <input type="submit" value="Entrar" class="btn">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <p >Não tem conta?<a class="ms-2" href="mailto:ti@redelvd.com.br">Consulte um Administrador</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 text-center footer">
        ©Copyright 2023 REDE LVD, Todos os direitos reservados.
    </div>
</body>

</body>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


  

    <script type="text/javascript">
        $('#username').mask('000.000.000-00');
    </script>

</html>