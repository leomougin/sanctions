<div class="text-center ">

    <h2 class="my-5"> S'inscrire </h2>
    <div class=" w-50 mx-auto shadow p-5 bg-secondary text-white rounded-5 ">
        <?php if(isset($erreurs)):?>
        <p class=" my-4 alert alert-danger"><?=$erreurs?></p>
        <?php endif;?>
        <form  action="" method="post" novalidate>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom *</label>
                <input type="text"
                       class="form-control "
                       id="nom" name="nom" value="" placeholder="Talbot">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom *</label>
                <input type="text"
                       class="form-control "
                       id="prenom" name="prenom" value="" placeholder="Hugo">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="text"
                       class="form-control "
                       id="email" name="email" value="" placeholder="hugo.tablot@gmail.com">
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe *</label>
                <input type="password"
                       class="form-control "
                       id="mdp" name="mdp" value="">
                <p class="text-start fst-italic"> Votre mot de passe doit contenir au minimum 8 caractères.</p>
            </div>

            <div class="mb-3">
                <label for="mdpconf" class="form-label">Confirmer le mot de passe *</label>
                <input type="password" class="form-control " id="mdpconf" name="mdpconf" value="">
            </div>
            <button type="submit" class="btn btn-outline-danger text-white">Valider</button>
        </form>

    </div>
</div>

