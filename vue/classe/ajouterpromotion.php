<?php //if(empty($_SESSION['utilisateur']['email'])) {
//    $this->redirect('/error');
//}
//?>
<div class="text-center ">

    <h2 class="my-5"> Ajouter une promotion </h2>
    <div class=" w-50 mx-auto shadow p-5 bg-secondary text-white rounded-5 ">
        <?php if(isset($erreur)):?>
            <p class=" my-4 alert alert-danger"><?=$erreur?></p>
        <?php endif;?>
        <form  action="" method="post" novalidate>
            <div class="mb-3">
                <label for="promotion" class="form-label">Promotion *</label>
                <input type="text"
                       class="form-control "
                       id="promotion" name="promotion" value="" placeholder="BTS SIO 2">
            </div>
            <div class="mb-3">
                <label for="annee" class="form-label">Année *</label>
                <input type="text"
                       class="form-control "
                       id="annee" name="annee" value="" placeholder="2024">
            </div>
            <button type="submit" class="btn btn-outline-dark text-white">Valider</button>
        </form>

    </div>
</div>

