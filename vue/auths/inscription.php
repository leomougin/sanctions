<div class="text-center ">

    <h2 class="my-5"> S'inscrire </h2>
    <div class=" w-50 mx-auto shadow p-5 bg-secondary text-white rounded-5 ">

        <?php if(isset($erreurs)):?>
        <p class=" my-4 alert alert-danger"><?=$erreurs?></p>
        <?php endif;?>

        <form  action="" method="post" novalidate>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom *</label>
                <input type="text"
                       class="form-control "
                       id="prenom" name="prenom" value="<?php echo isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]):''; ?>" placeholder="Hugo">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom *</label>
                <input type="text"
                       class="form-control "
                       id="nom" name="nom" value="<?php echo isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]):''; ?>" placeholder="Talbot">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="text"
                       class="form-control "
                       id="email" name="email" value="<?php echo isset($_POST["email"]) ? htmlspecialchars($_POST["email"]):''; ?>" placeholder="hugo.tablot@gmail.com">
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe *</label>
                <!-- info box -->
                <span class="text-end">
                        <button type="button" class="btn mb-1" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                            </svg>
                        </button>
                    </span>
                <div class="modal fade text-black" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-secondary">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Les caractéristiques de votre mot de
                                    passe </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body bg-white text-start fst-italic">
                                <ul>
                                    <li>
                                        Votre mot de passe doit contenir au moins 8 caractères
                                    </li>
                                    <li>
                                        Il doit contenir au moins une minuscule, une majuscule et un chiffre!
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="password"
                       class="form-control "
                       id="mdp" name="mdp" ">
            </div>

            <div class="mb-3">
                <label for="mdpconf" class="form-label">Confirmer le mot de passe *</label>
                <input type="password" class="form-control " id="mdpconf" name="mdpconf" >
            </div>
            <button type="submit" class="btn btn-outline-dark text-white">Valider</button>
        </form>

    </div>
</div>

