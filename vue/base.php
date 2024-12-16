<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Lycée Gaudper - Gestions des Sanctions</title>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-sm bg-secondary  ">
        <div class="container-fluid mx-5 ">
            <img class="d-none d-md-block" width="50px" height="50px" src="/assets/img/logo.png" alt="Logo pingouin du Lycée Gaudper">
            <a class="navbar-brand ms-5 text-light" href="/">Lycée Gaudper</a>
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse me-auto mb-2 mb-md-0 justify-content-end " id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <?php if (!empty($_SESSION["utilisateur"]["prenom"])): ?>

                        <li class="nav-item ms-2">
                            <a class="nav-link text-white " href="/">Accueil</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link  text-white " href="/ajouterpromotion">Ajouter une promotion</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link  text-white " href="/ajoutereleve">Ajouter des élèves</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link  text-white " href="#">Ajouter une sanction</a>
                        <li class="nav-item ms-2">
                            <a class="nav-link btn btn-outline-dark text-white " href="/deconnexion">Se déconnecter</a>
                        </li>
                    <?php endif ?>
                    <?php if (empty($_SESSION["utilisateur"]["prenom"])): ?>
                        <li class="nav-item ms-2">
                            <a class="nav-link text-white " href="/">Accueil</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link btn btn-outline-dark text-white" href="/inscription">S'inscrire</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link btn btn-outline-dark text-white" href="/connexion">Se connecter</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<style>
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }
    .content {
        flex: 1;
    }
</style>

<?php if (!empty($_SESSION["utilisateur"]["prenom"])): ?>
<p class="fst-italic text-end m-4 text-black">Vous êtes connecté en tant que <span class="fw-bold"><?=$_SESSION["utilisateur"]["prenom"]?></span>!!</p>
<?php endif ?>

<div class="container content">
    <?=$content?>
</div>

<footer class="bg-secondary d-flex flex-wrap justify-content-between mt-5 align-items-center py-3 border-top ">
    <div class="container text-center text-white ">
        &copy; 2024 Lycée Gaudper - Gestion des Sanctions
    </div>
    <div id="reseau" class="container text-center ">

        <a href="https://www.facebook.com/">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
            </svg>
        </a>

        <a href="https://www.youtube.com/">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-youtube" viewBox="0 0 16 16">
                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
            </svg>
        </a>
    </div>
    <div id="contact" class="container text-center ">
        <a href="#">Nous contacter</a>
    </div>
    <div id="mention" class="container text-center ">
        <a href="mentionlegal">Mention légales</a>
    </div>
    <style>
        #reseau a, a {
            text-decoration: none;
            color:white;
        }
    </style>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>