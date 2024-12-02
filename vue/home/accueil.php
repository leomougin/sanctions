<?php
$inscriptionMessage='';
if(isset($_SESSION['inscriptionMessage'])){
    $inscriptionMessage=$_SESSION['inscriptionMessage'];
    unset($_SESSION['inscriptionMessage']);
}
?>

<style>
    .info{
        font-style:italic;
    }
</style>

<div class="text-center info">
    <p>
        Afin de pouvoir utiliser les différentes fonctionnalités de notre portail informatique, il est nécéssaire
        d'être <a class="fw-bold text-black" href="/connexion">connecté</a>. Si vous n'avez pas encore de compte vous avez la possiblité de vous <a class="fw-bold text-black" href="/inscription">inscrire</a>.
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

