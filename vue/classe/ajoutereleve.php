<?php if(empty($_SESSION['utilisateur']['email'])) {
    $_SESSION["non_connecte"]=1;
    $this->redirect('/connexion');
}
?>
<div class="text-center ">

    <h2 class="my-5"> Ajouter des élèves </h2>
    <div class=" w-50 mx-auto shadow p-5 bg-secondary text-white rounded-5 ">
        <?php if(isset($erreurs)):?>
            <p class=" my-4 alert alert-danger"><?=$erreurs?></p>
        <?php endif;?>
        <form  action="" method="post" enctype="multipart/form-data" novalidate>
            <div class="mb-3">
                <label for="fichier" class="form-label">Élève *</label>
                <input type="file"
                        class="form-control"
                        id="fichier" name="fichier">

            </div>
            <div class="mb-3">
                <label for="classe" class="form-label">Classe *</label>
                <select class="form-control"id="classe" name="classe">
                    <option selected>Choisissez une classe</option>
                    <?php foreach ($promotions as $promotion):
                        echo "<option value=" .$promotion->getId(). ">".$promotion->getNom()." - ".$promotion->getAnnee()."</option>";
                    endforeach;?>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-dark text-white">Valider</button>
        </form>

    </div>
</div>

