<?php if(!empty($_SESSION['utilisateur']['email'])) {
    $this->redirect('/error');
}
if(isset($_SESSION['inscription_success'])): ?>
<p class=" my-4 alert alert-success text-center">Vous avez bien créer votre compte!</p>
<?php $_SESSION['inscription_success'] = null;
endif;
if(isset($_SESSION['non_connecte'])):?>
<p class=" my-4 alert alert-danger text-center">Vous devez être connecté pour accéder à cette fonctionnalitée!</p>
<?php $_SESSION['non_connecte']=null;
endif;?>

<div class="text-center ">

    <h2 class="my-5"> Se connecter </h2>
    <div class=" w-50 mx-auto shadow p-5 bg-secondary text-white rounded-5 ">
        <?php if(isset($erreurs)):?>
            <p class=" my-4 alert alert-danger"><?=$erreurs?></p>
        <?php endif;?>
        <form  action="" method="post" novalidate>
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="text"
                       class="form-control "
                       id="email" name="email" value="" placeholder="hugo.tablot@gmail.com">
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe *</label>
                <input type="password" class="form-control " id="mdp" name="mdp" value="">
            </div>

            <button type="submit" class="btn btn-outline-dark text-white">Valider</button>
        </form>

    </div>
</div>

