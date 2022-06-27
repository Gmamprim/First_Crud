<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['user'])) {
    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Declação META -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Declação Titulo -->
    <title>
        My First CRUD
    </title>

    <!-- Declação dos links -->
    <link rel="stylesheet" href="./src/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto d-flex justify-content-center align-items-center" style="height: 100vh; overflow-y: hidden;">
        <form style="width:450px; height:500px" method="post" action="./actions/loginCheck.php">

            <img class="mb-4" src="https://github.com/Gmamprim.png" alt="" style="width:auto;height:300px">
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <?php
            if (isset($_SESSION['error_login'])) { ?>
                <p class="text-danger"><?= $_SESSION['error_login'] ?></p>
            <?php } ?>
            <div class="form-floating mt-2">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">E-mail</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <label for="password">Senha</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Login</button>

        </form>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>