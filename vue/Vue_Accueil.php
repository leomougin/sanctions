<?php
$inscriptionMessage='';
if(isset($_SESSION['inscriptionMessage'])){
    $inscriptionMessage=$_SESSION['inscriptionMessage'];
    unset($_SESSION['inscriptionMessage']);
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lycée Gaudper | Gestion des sanctions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<style>
    .info{
        font-style:italic;
    }
</style>

<div class="text-center info">
    <p>
        Afin de pouvoir utiliser les différentes fonctionnalités de notre portail informatique, il est nécéssaire
        d'être <a class="fw-bold text-black" href="#">connecté</a>. Si vous n'avez pas encore de compte vous avez la possiblité de vous <a class="fw-bold text-black" href="#">inscrire</a>.
    </p>
</div>

<?php if(!empty($inscriptionMessage)):?>
    <div class=" my-4 alert alert-success"><?=$inscriptionMessage?></div>
<?php endif;?>

<div class="container mt-5">
    <div class="text-center mb-5">
        <h1>
            Application de gestion des sanctions
        </h1>
    </div>
    <div class="text-center">
        <p class="my-5">
            Cette application web a été développée pour faciliter le suivi des sanctions et encourager une meilleure
            communication autour du comportement des élèves de notre établissement.
            Pour les élèves ainsi que leurs parents c'est un moyen de suivre leur situation afin de comprendre les attentes
            de l'établissement au mieux. Grâce à ce portail informatique, nos professeurs pourront aider et suivre les
            élèves grâce à un suivi efficace et organisé.
        </p>
        <p>
            Le <span class="fw-bold">Lycée Gaudper</span> encourage
            nos élèves et étudiants à adopter un comportement <span class="fw-bold">responsable</span> et <span class="fw-bold">respectueux</span>, afin de contribuer à un environnement
            scolaire sain pour tous.
        </p>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
