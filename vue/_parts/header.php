
<header>
    <nav class="navbar navbar-expand-sm bg-secondary ">
        <div class="container-fluid mx-5">
            <img class="d-none d-md-block" width="50px" height="50px" src="/assets/img/logo.png" alt="Logo pingouin du Lycée Gaudper">
            <a class="navbar-brand ms-5 text-light" href="/">Lycée Gaudper</a>
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse me-auto mb-2 mb-md-0 justify-content-end " id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <?php if (!empty($_SESSION)): ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#"">Accueil</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link text-light " href="#">Ajouter une sanction</a>
                        </li>
                        <a class="nav-link text-light" href="#">Sanctionner</a>
                        </li>
                        <li>
                            <a class="nav-link text-light" href="#">Se déconnecter</a>
                        </li>
                    <?php endif ?>
                    <?php if (empty($_SESSION)): ?>
                        <li class="nav-item ms-2">
                            <a class="nav-link text-light btn btn-outline-danger " href="#">S'inscrire</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link text-light btn btn-outline-danger" href="#">Se connecter</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php if (isset($_SESSION["utilisateur"])): ?>
    <p class="fst-italic text-end me-5 mt-3">Vous êtes connecté en tant que <span class="text-danger">PSEUDO UTILISATEUR</span>!!</p>
<?php endif ?>